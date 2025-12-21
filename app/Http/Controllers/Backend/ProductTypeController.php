<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // For slug generation

class ProductTypeController extends Controller
{
    public function index(Request $request)
    {
        $productTypes = ProductType::query()
            ->when($request->filled('search'), fn($q) =>
            $q->where('name', 'like', '%' . $request->search . '%'))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.product-type.index', compact('productTypes'));
    }

    public function create()
    {
        return view('admin.product-type.create');
    }

    public function store(Request $request)
    {
        // ✅ 1. Validate input
        $request->validate([
            'name' => 'required|string|max:255|unique:product_types,name',
        ]);

        // ✅ 2. Create slug from name
        $slug = Str::slug($request->name);

        // If slug already exists, append a number
        $count = ProductType::where('slug', 'LIKE', "{$slug}%")->count();
        if ($count > 0) {
            $slug = "{$slug}-" . ($count + 1);
        }

        // ✅ 3. Create new product_types
        ProductType::create([
            'name' => $request->name,
            'slug' => $slug,
        ]);

        // ✅ 4. Redirect with success message
        return redirect()->back()->with('success', 'Product Types created successfully!');
    }

    public function edit($id)
    {
        $productType = ProductType::findOrFail($id);
        return view('admin.product-type.edit', compact('productType'));
    }

    public function update(Request $request, $id)
    {
        // ✅ 1. Validate input
        $request->validate([
            'name' => 'required|string|max:255|unique:product_types,name,' . $id,
        ]);

        // ✅ 2. Find the division
        $productType = ProductType::findOrFail($id);

        // ✅ 3. Generate new slug from name
        $slug = Str::slug($request->name);

        // Ensure slug uniqueness
        $count = ProductType::where('slug', 'LIKE', "{$slug}%")
            ->where('id', '!=', $id)
            ->count();
        if ($count > 0) {
            $slug = "{$slug}-" . ($count + 1);
        }

        // ✅ 4. Update the division
        $productType->update([
            'name' => $request->name,
            'slug' => $slug,
        ]);

        // ✅ 5. Redirect with success message
        return redirect()->back()->with('success', 'Product Types updated successfully!');
    }

    public function toggleStatus($id)
    {
        $productType = ProductType::findOrFail($id);
        $productType->status = $productType->status == 1 ? 0 : 1;
        $productType->save();

        return redirect()->back()->with('success', 'Status updated successfully.');
    } ## End Mehtod

    public function destroy($id)
    {
        // ✅ 1. Find the division by ID
        $productType = ProductType::findOrFail($id);

        // ✅ 2. Delete the record
        $productType->delete();

        // ✅ 3. Redirect back with success message
        return redirect()->back()->with('success', 'Product Type deleted successfully!');
    }
}
