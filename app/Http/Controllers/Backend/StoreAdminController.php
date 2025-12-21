<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreAdminController extends Controller
{
    public function index(Request $request)
    {
        $user_id = Auth::user()->id;

        if (Auth::user()->role == "Store Admin") {
            $user_id = Auth::user()->user_id;
        }

        $bookingOperators = User::query()
            ->when($request->filled('search'), function ($q) use ($request) {
                $search = $request->search;
                $q->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%");
                });
            })
            ->where('user_id', '=', $user_id)
            ->where('role', '=', 'store admin')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.store-admin.index', compact('bookingOperators'));
    } ## End Mehtod


    public function store(Request $request)
    {
        // ✅ Step 1: Validate incoming request
        $validatedData = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'phone'    => 'nullable|string|max:20',
            'address'  => 'nullable|string',
        ]);

        // ✅ Step 3: Create the booking store
        $store = new User();
        $store->user_id  = Auth::user()->id;
        $store->name     = $validatedData['name'];
        $store->email    = $validatedData['email'];
        $store->password = bcrypt($validatedData['password']);
        $store->phone    = $validatedData['phone'] ?? null;
        $store->address  = $validatedData['address'] ?? null;
        $store->role     = 'Store Admin';
        $store->save();

        // Add role to model_has_roles table automatically
        $store->assignRole('Store Admin');

        // ✅ Step 4: Return response
        return redirect()->back()->with('success', 'Store Admin created successfully!');
    }
}
