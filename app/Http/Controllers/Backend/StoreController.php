<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Str;

class StoreController extends Controller
{
    public function index(Request $request, $id)
    {
        $stores = Store::query()
            ->when($request->filled('search'), fn($q) =>
            $q->where('name', 'like', '%' . $request->search . '%'))
            ->where('merchant_id', '=', $id)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $storeAdmins = User::where('role', '=', 'store-admin')->where('status', '=', 1)->get(['id', 'name']);
        return view('admin.store.index', compact('stores', 'id', 'storeAdmins'));
    }


    public function add(Request $request, $id)
    {
        return view('admin.store.create', compact('id'));
    }

    /**
     * Show the form for creating.
     */
    public function create()
    {
        return view('admin.store.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'merchant_id' => 'required|string',
            'name' => 'required|string|max:255|unique:stores,name',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email',
            'address' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:2048',
        ]);

        $data = [
            'merchant_id' => $validated['merchant_id'],
            'name' => $validated['name'],
            'primary_phone' => $validated['phone'],
            'email' => $validated['email'],
            'address' => $validated['address'],
            'slug' => Str::slug($validated['name']),
            'logo' => $request->hasFile('image') ? $this->uploadImage($request->file('image')) : null,
        ];

        Store::create($data);

        return back()->with('success', 'Store added successfully.');
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
}
