<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShopController extends Controller
{

    public function edit($id)
    {
        $shop = Shop::findOrFail($id);
        return view('admin.shop.edit', compact('shop'));
    }

    /**
     * Store a newly created shop.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:shops,name',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email',
            'address' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:2048',
        ]);

        $data = [
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'address' => $validated['address'],
            'slug' => Str::slug($validated['name']),
            'logo' => $request->hasFile('image') ? $this->uploadImage($request->file('image')) : null,
        ];

        Shop::create($data);

        return back()->with('success', 'Shop added successfully.');
    }


    /**
     * Toggle the status
     */
    public function toggleStatus($id)
    {
        $data = Shop::findOrFail($id);
        $data->status = !$data->status;
        $data->save();

        return redirect()->back()->with('success', 'Shop status updated.');
    }

    /**
     * Upload image and return its path.
     */
    private function uploadImage($image)
    {
        $path = 'uploads/shops';
        $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path($path), $filename);

        return $path . '/' . $filename;
    }

    /**
     * Delete image from storage if not default.
     */
    private function deleteImage($imagePath)
    {
        if (!$imagePath || $imagePath === 'images/no_image.jpg')
            return;

        $fullPath = public_path($imagePath);
        if (file_exists($fullPath))
            @unlink($fullPath);
    }
}
