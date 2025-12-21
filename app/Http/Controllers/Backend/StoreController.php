<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\CourierPlatform;
use App\Models\CourierStore;
use App\Models\Store;
use App\Models\User;
use Enan\PathaoCourier\Facades\PathaoCourier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Http\Service\PathaoService;
use Illuminate\Support\Facades\File;
use App\Models\Zone;

class StoreController extends Controller
{
    public function index(Request $request)
    {
        $user_id = Auth::user()->id;

        if (Auth::user()->role == "Store Admin") {
            $user_id = Auth::user()->user_id;
        }

        $stores = Store::query()
            ->when($request->filled('search'), function ($q) use ($request) {
                $search = $request->search;
                $q->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('primary_phone', 'like', "%{$search}%");
                });
            })
            ->where('merchant_id', '=', $user_id)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $storeAdmins = User::where('user_id', '=', $user_id)->where('role', '=', 'Store Admin')->where('status', '=', 1)->get(['id', 'name']);
        return view('admin.store.index', compact('stores', 'storeAdmins'));
    }

    public function list(Request $request)
    {
        $stores = Store::query()
            ->when($request->filled('search'), function ($q) use ($request) {
                $search = $request->search;
                $q->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('primary_phone', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.store.list', compact('stores'));
    }

    public function add(Request $request)
    {
        $id = Auth::user()->id;

        if (Auth::user()->role == "Store Admin") {
            $id = Auth::user()->user_id;
        }

        $get_cities = PathaoCourier::GET_CITIES();
        $cities = $get_cities['data']['data'] ?? [];
        
        return view('admin.store.create', compact('id', 'cities'));
    }

    /**
     * Show the form for creating.
     */
    public function create()
    {
        $get_cities = PathaoCourier::GET_CITIES();
        $cities = $get_cities["data"]["data"];

        return view('admin.store.create', compact('cities'));
    }

    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'merchant_id' => 'required|string',
        //     'owner_name' => 'required|string|max:255',
        //     'name' => 'required|string|max:255|unique:stores,name',
        //     'phone' => 'required|string|size:11',
        //     'email' => 'nullable|email',
        //     'address' => 'required|string|min:15|max:120',
        //     'logo' => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:2048',
        //     'city_id' => 'required',
        //     'zone_id' => 'required',
        //     'area_id' => 'required',
        // ]);

        $validated = $request->validate(
            [
                'merchant_id' => 'required|string',
                'owner_name'  => 'required|string|max:255',
                'name'        => 'required|string|max:255|unique:stores,name',
                'phone'       => 'required|string|size:11',
                'email'       => 'nullable|email',
                'address'     => 'required|string|min:15|max:120',
                'logo'        => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:2048',
                'city_id'     => 'required',
                'zone_id'     => 'nullable',
                'area_id'     => 'nullable',
            ],
            [
                'merchant_id.required' => 'Merchant ID is required.',
                'merchant_id.string'   => 'Merchant ID must be a valid string.',

                'owner_name.required'  => 'Owner name is required.',
                'owner_name.string'    => 'Owner name must be text.',
                'owner_name.max'       => 'Owner name may not exceed 255 characters.',

                'name.required'        => 'Store name is required.',
                'name.string'          => 'Store name must be text.',
                'name.max'             => 'Store name may not exceed 255 characters.',
                'name.unique'          => 'This store name already exists.',

                'phone.required'       => 'Phone number is required.',
                'phone.string'         => 'Phone number must be text.',
                'phone.size'           => 'Phone number must be exactly 11 digits.',

                'email.email'          => 'Please provide a valid email address.',

                'address.required'     => 'Address is required.',
                'address.string'       => 'Address must be text.',
                'address.min'          => 'Address must be at least 15 characters.',
                'address.max'          => 'Address may not exceed 120 characters.',

                'logo.image'           => 'Logo must be an image file.',
                'logo.mimes'           => 'Logo must be a JPG, JPEG, PNG, SVG, or WEBP file.',
                'logo.max'             => 'Logo size must not exceed 2MB.',

                'city_id.required'     => 'City selection is required.',
                'zone_id.required'     => 'Zone selection is required.',
                // 'area_id.required'     => 'Area selection is required.',
            ]
        );

        $data = [
            'merchant_id' => $validated['merchant_id'],
            'name' => $validated['name'],
            'owner_name' => $validated['owner_name'], // Store owner name in owner_phone field
            'primary_phone' => $validated['phone'],
            'email' => $validated['email'],
            'address' => $validated['address'],
            // API returns structured objects; store string/IDs as appropriate
            'city' => $request->input('city_id'),
            'zone' => $request->input('zone_id'),
            'area' => $request->input('area_id'),
            'slug' => Str::slug($validated['name']),
            'logo' => $request->hasFile('image') ? $this->uploadImage($request->file('image')) : null,
        ];

        // Create Pathao store using the request object directly
        // $pathaoStoreRequest = new \Enan\PathaoCourier\Requests\PathaoStoreRequest();
        // $pathaoStoreRequest->merge([
        //     'name' => $validated['name'], // store name
        //     'contact_name' => $validated['owner_name'],
        //     'contact_number' => $validated['phone'],
        //     'address' => $validated['address'],
        //     'city_id' => (int) $request->input('city_id'),
        //     'zone_id' => (int) $request->input('zone_id'),
        //     'area_id' => (int) $request->input('area_id'),
        // ]);

        // try {
        // $pathaoResponse = PathaoCourier::CREATE_STORE($pathaoStoreRequest);

        //     Log::info('Pathao Store Creation Response: ', $pathaoResponse);

        //     // Check if Pathao store creation was successful
        //     if (isset($pathaoResponse['status']) && $pathaoResponse['status'] != 200) {
        //         return back()
        //             ->withInput()
        //             ->with('error', 'Failed to create store in Pathao: ' . ($pathaoResponse['message'] ?? 'Unknown error'));
        //     }

        //     // Extract and store the Pathao store_id from response

        //     // When a new store is created, Pathao keeps the status as Approval Pending, but when stores are retrieved
        //     // from the API later, they appear there. So we fetch the store ID by listing stores; however, for that the store must be
        //     // Activated, which is not the case immediately after creation.
        //     // Therefore, this method shall be moved elsewhere after some time or upon status change.
        //     // Given the API guide, Pathao doesn't provide any webhooks for store approval status changes.
        //     $pathaoStoreId = $this->retrievePathaoStoreId($validated['name']);
        //     if ($pathaoStoreId) {
        //         $data['pathao_store_id'] = $pathaoStoreId;
        //         Log::info('Pathao Store ID retrieved: ' . $pathaoStoreId);
        //     }

        // } catch (\Exception $e) {
        //     Log::error('Pathao Store Creation Error: ' . $e->getMessage());
        //     return back()
        //         ->withInput()
        //         ->with('error', 'Pathao API error: ' . $e->getMessage());
        // }

        Store::create($data);

        return back()->with('success', 'Store added successfully!');
    }

    /**
     * Retrieve Pathao store ID by store name
     * @param string $storeName
     * @return int|null
     */
    private function retrievePathaoStoreId(string $storeName)
    {
        try {
            $page = 1;
            $maxPages = 10; // Prevent infinite loop

            while ($page <= $maxPages) {
                $storesResponse = PathaoCourier::GET_STORES($page);

                if (isset($storesResponse['data']) && is_array($storesResponse['data'])) {
                    foreach ($storesResponse['data'] as $store) {
                        // Match store by name (case-insensitive)
                        if (isset($store['name']) && strcasecmp($store['name'], $storeName) === 0) {
                            return $store['store_id'] ?? null;
                        }
                    }

                    // If no more pages, break
                    if (empty($storesResponse['data']) || count($storesResponse['data']) < 10) {
                        break;
                    }

                    $page++;
                } else {
                    break;
                }
            }
        } catch (\Exception $e) {
            Log::error('Error retrieving Pathao store ID: ' . $e->getMessage());
        }

        return null;
    }

    public function assignStoreAdmin(Request $request, $id)
    {
        // $request->validate([
        //     'admin_id' => 'required|exists:users,id',
        // ]);

        // Update only the column
        Store::where('id', $id)
            ->update(['store_admin_id' => $request->admin_id]);

        return back()->with('success', 'Store admin assigned successfully!');
    }

    private function uploadImage($image)
    {
        $path = 'uploads/store';
        $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path($path), $filename);

        return $path . '/' . $filename;
    }

    public function show(Request $request)
    {
        $store = Store::where('merchant_id', '=', Auth::user()->id)->first();

        $stores = [];
        return view('admin.store.show', compact('store', 'stores'));
    }

    public function toggleStatus($id)
    {
        $store = Store::findOrFail($id);
        $store->status = $store->status == 1 ? 0 : 1;
        $store->save();

        return redirect()->back()->with('success', 'Status updated successfully.');
    } ## End Mehtod

    /**
     * Show the form for creating.
     */
    public function edit($id)
    {
        $store = Store::findOrFail($id);
        $inputCityId = (int) $store->city; // your input
        $inputZoneId = (int) $store->zone; // your input
        $inputAreaId = (int) $store->area; // your input
        $cityName = null;
        $zoneName = null;
        $areaName = null;

        $cities = PathaoCourier::GET_CITIES();
        foreach ($cities['data']['data'] as $city) {
            if ($city['city_id'] == $inputCityId) {
                $cityName = $city['city_name'];
                break;
            }
        }


        $zones_data = PathaoCourier::GET_ZONES($inputCityId);
        foreach ($zones_data['data']['data'] as $zone) {
            if ($zone['zone_id'] == $inputZoneId) {
                $zoneName = $zone['zone_name'];
                break;
            }
        }

        $data = PathaoCourier::GET_AREAS($inputZoneId);
        foreach ($data['data']['data'] as $area) {
            if ($area['area_id'] == $inputAreaId) {
                $areaName = $area['area_name'];
                break;
            }
        }

        return view('admin.store.edit', compact('cities', 'store', 'id', 'cityName', 'zoneName', 'areaName'));
    }

    public function update(Request $request)
    {
        // 1️⃣ Validation
        $request->validate([
            'name'       => 'required|string|max:255|unique:stores,name,' . $request->store_id,
            'owner_name' => 'nullable|string|max:255',
            'phone'      => 'nullable|string|max:20',
            'email'      => 'nullable|email|max:255',
            'address'    => 'nullable|string',
            'city_id'    => 'nullable|integer',
            'zone_id'    => 'nullable|integer',
            'area_id'    => 'nullable|integer',
            'image'      => 'nullable|image|mimes:png,jpg,jpeg,svg,webp|max:2048',
        ]);

        // 2️⃣ Find Store
        $store = Store::findOrFail($request->store_id);

        // 3️⃣ Handle Image Upload
        if ($request->hasFile('image')) {

            // Delete old image
            if (!empty($store->logo) && File::exists(public_path($store->logo))) {
                File::delete(public_path($store->logo));
            }

            $image      = $request->file('image');
            $imageName  = 'store_' . time() . '_' . Str::random(6) . '.' . $image->getClientOriginalExtension();
            $imagePath  = 'uploads/store/' . $imageName;

            $image->move(public_path('uploads/store'), $imageName);

            $store->logo = $imagePath;
        }


        if ($request->city_id == 0) {
            $city_id = $store->city;
        } else {
            $city_id = $request->city_id;
        }

        if ($request->zone_id == 0) {
            $zone_id = $store->zone;
        } else {
            $zone_id = $request->zone_id;
        }

        if ($request->area_id == 0) {
            $area_id = $store->area;
        } else {
            $area_id = $request->area_id;
        }

        // dd($city_id, $zone_id, $area_id);

        // 4️⃣ Update Store Data
        $store->update([
            'name'          => $request->name,
            'owner_name'    => $request->owner_name,
            'primary_phone' => $request->phone,
            'email'         => $request->email,
            'address'       => $request->address,
            'city'          => (int) $city_id,
            'zone'          => (int) $zone_id,
            'area'          => (int) $area_id,
        ]);

        // 5️⃣ Redirect
        return redirect()
            ->back()
            ->with('success', 'Store updated successfully!');
    }



    #### Courier Store ####

    public function courierList(Request $request)
    {
        $courier_platforms = CourierPlatform::all();
        $my_stores = CourierStore::get();

        return view('admin.courier-services.list', compact('courier_platforms', 'my_stores'));
    }

    public function connectStore(CourierPlatform $courierPlatform)
    {
        return view('admin.connect-store.pathao', compact('courierPlatform'));
    }

    public function connectPathao(Request $request)
    {
        // Validate request
        $request->validate([
            'client_id' => 'required|string',
            'client_secret' => 'required|string',
            'username' => 'required|string',
            'password' => 'required|string',
            'store_id' => 'required|string',
            'store_name' => 'required|string',
        ]);

        $cred = [
            "client_id" => $request->client_id,
            "client_secret" => $request->client_secret,
            "username" => $request->username,
            "password" => $request->password,
            "grant_type" => $request->grant_type ?? "password",
        ];

        // Call Pathao Access Token API
        $response = (new PathaoService())->getAccessToken($cred);

        // If API failed
        if (!isset($response->code) || $response->code != 200) {
            return redirect()
                ->back()
                ->withInput() // keep old values
                ->with([
                    'message' => "The user credentials were incorrect",
                    'alert-type' => 'error'
                ]);
        }

        // Prevent connecting same store twice
        $exists = CourierStore::where('user_id', auth()->id())
            ->where('courier_platform_id', 1)
            ->where('store_id', $request->store_id)
            ->first();

        if ($exists) {
            return redirect()
                ->back()
                ->with([
                    'message' => "This store is already connected",
                    'alert-type' => 'warning'
                ]);
        }

        // Store to database
        CourierStore::create([
            'user_id' => auth()->id(),
            'courier_platform_id' => 1,
            'client_id' => $request->client_id,
            'client_secret' => $request->client_secret,
            'username' => $request->username,
            'password' => encrypt($request->password), // secure
            'store_id' => $request->store_id,
            'store_name' => $request->store_name,
            'token' => $response->data['access_token'],
            'refresh_token' => $response->data['refresh_token'],
            'expires_in' => time() + $response->data['expires_in'],
            'store_token' => Str::uuid(),
        ]);

        return redirect()
            ->route('admin.store.connect')
            ->with([
                'message' => 'Store connected successfully',
                'alert-type' => 'success'
            ]);
    }



    // public function connectPathao(Request $request)
    // {
    //     $cred = [
    //         "client_id" => $request->client_id,
    //         "client_secret" => $request->client_secret,
    //         "username" => $request->username,
    //         "password" => $request->password,
    //         "grant_type" => $request->grant_type,
    //     ];

    //     $response = (new PathaoService())->getAccessToken($cred);

    //     if ($response->code == 200) {

    //         CourierStore::create([
    //             'user_id' => auth()->user()->id,
    //             'courier_platform_id' => 1,
    //             'client_id' => $request->client_id,
    //             'client_secret' => $request->client_secret,
    //             'username' => $request->username,
    //             'password' => $request->password,
    //             'store_id' => $request->store_id,
    //             'store_name' => $request->store_name,
    //             'token' => $response->data['access_token'],
    //             'refresh_token' => $response->data['refresh_token'],
    //             'expires_in' => time() + $response->data['expires_in'],
    //             'store_token' => Str::uuid()
    //         ]);

    //         return redirect()->route('admin.store.connect')->with(['message' => 'Store connected successfully', 'alert-type' => 'success']);
    //     } else {
    //         return redirect()->route('admin.store.connect')
    //             ->with(['message' => "The user credentials were incorrect", 'alert-type' => 'error']);
    //     }
    // }
}
