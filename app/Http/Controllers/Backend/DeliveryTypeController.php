<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DeliveryType;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // For slug generation

class DeliveryTypeController extends Controller
{
    public function index(Request $request)
    {
        $deliveryTypes = DeliveryType::query()
            ->when($request->filled('search'), fn($q) =>
            $q->where('name', 'like', '%' . $request->search . '%'))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.delivery-type.index', compact('deliveryTypes'));
    }

    public function create()
    {
        return view('admin.delivery-type.create');
    }

    public function store(Request $request)
    {
        // ✅ 1. Validate input
        $request->validate([
            'name' => 'required|string|max:255|unique:delivery_types,name',
        ]);

        // ✅ 2. Create slug from name
        $slug = Str::slug($request->name);

        // If slug already exists, append a number
        $count = DeliveryType::where('slug', 'LIKE', "{$slug}%")->count();
        if ($count > 0) {
            $slug = "{$slug}-" . ($count + 1);
        }

        // ✅ 3. Create new delivery_types
        DeliveryType::create([
            'name' => $request->name,
            'slug' => $slug,
        ]);

        // ✅ 4. Redirect with success message
        return redirect()->back()->with('success', 'Delivery Types created successfully!');
    }

    public function edit($id)
    {
        $deliveryType = DeliveryType::findOrFail($id);
        return view('admin.delivery-type.edit', compact('deliveryType'));
    }

    public function update(Request $request, $id)
    {
        // ✅ 1. Validate input
        $request->validate([
            'name' => 'required|string|max:255|unique:delivery_types,name,' . $id,
        ]);

        // ✅ 2. Find the division
        $deliveryType = DeliveryType::findOrFail($id);

        // ✅ 3. Generate new slug from name
        $slug = Str::slug($request->name);

        // Ensure slug uniqueness
        $count = DeliveryType::where('slug', 'LIKE', "{$slug}%")
            ->where('id', '!=', $id)
            ->count();

        if ($count > 0) {
            $slug = "{$slug}-" . ($count + 1);
        }

        // ✅ 4. Update the division
        $deliveryType->update([
            'name' => $request->name,
            'slug' => $slug,
        ]);

        // ✅ 5. Redirect with success message
        return redirect()->back()->with('success', 'Delivery Types updated successfully!');
    }

    public function toggleStatus($id)
    {
        $deliveryType = DeliveryType::findOrFail($id);
        $deliveryType->status = $deliveryType->status == 1 ? 0 : 1;
        $deliveryType->save();

        return redirect()->back()->with('success', 'Status updated successfully.');
    } ## End Mehtod

    public function destroy($id)
    {
        // ✅ 1. Find the division by ID
        $deliveryType = DeliveryType::findOrFail($id);

        // ✅ 2. Delete the record
        $deliveryType->delete();

        // ✅ 3. Redirect back with success message
        return redirect()->back()->with('success', 'Delivery Type deleted successfully!');
    }
}
