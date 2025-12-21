<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::query()
            ->when($request->filled('search'), function ($q) use ($request) {
                $search = $request->search;
                $q->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                });
            })
            ->where('user_id', '=', Auth::user()->id)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.product.index', compact('products'));
    } ## End Mehtod

    public function create()
    {
        return view('admin.product.create');
    } ## End Mehtod

    public function store(Request $request)
    {
        // ✅ Validate request
        $validatedData = $request->validate([
            'name'       => 'required|string',
            'category'   => 'nullable|string',
            'weight'     => 'nullable|string',
            'dimensions' => 'nullable|string',
            'stock'      => 'nullable|integer|min:0',
            'image'      => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $sku = 'SKU-' .  now()->format('YmdHis') . '-' . strtoupper(Str::random(8) . '-' . Auth::user()->id ?? 0);

        // ✅ Create new product
        $product = new Product();
        $product->user_id = Auth::id();
        $product->name = $validatedData['name'];
        $product->sku = $sku;
        $product->category = $validatedData['category'] ?? null;
        $product->weight = $validatedData['weight'] ?? null;
        $product->dimensions = $validatedData['dimensions'] ?? null;
        $product->stock = $validatedData['stock'] ?? 0;

        // ✅ Handle image upload if exists
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            ## Generate new filename and store
            $filename = now()->format('Ymd_His') . '_' . $file->getClientOriginalName();
            $filePath = 'uploads/products/' . $filename;
            $file->move(public_path('uploads/products'), $filename);

            $product->image = $filePath;
        }

        $product->save();

        // ✅ Redirect back with success message
        return redirect()->back()->with('success', 'Product created successfully!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.edit', compact('product'));
    } ## End Mehtod

    public function update(Request $request, $id)
    {
        // ✅ Find the product
        $product = Product::findOrFail($id);

        // ✅ Validate request
        $validatedData = $request->validate([
            'name'       => 'required|string',
            'category'   => 'nullable|string',
            'weight'     => 'nullable|string',
            'dimensions' => 'nullable|string',
            'image'      => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // ✅ Update product fields
        $product->name       = $validatedData['name'];
        $product->category   = $validatedData['category'] ?? $product->category;
        $product->weight     = $validatedData['weight'] ?? $product->weight;
        $product->dimensions = $validatedData['dimensions'];

        // ✅ Handle image upload if exists
        if ($request->hasFile('image')) {
            // 🧹 Delete old image if exists
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }

            $file = $request->file('image');
            $filename = now()->format('Ymd_His') . '_' . $file->getClientOriginalName();
            $filePath = 'uploads/products/' . $filename;
            $file->move(public_path('uploads/products'), $filename);

            $product->image = $filePath;
        }

        $product->save();

        // ✅ Redirect back with success message
        return redirect()->back()->with('success', 'Product updated successfully!');
    }
}
