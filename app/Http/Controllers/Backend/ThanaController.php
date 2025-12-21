<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Thana;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // For slug generation

class ThanaController extends Controller
{
    public function index(Request $request)
    {
        $thanas = Thana::query()
            ->when($request->filled('search'), fn($q) =>
            $q->where('name', 'like', '%' . $request->search . '%'))
            ->latest()
            ->orderBy('district_id')
            ->paginate(20)
            ->withQueryString();

        return view('admin.thana.index', compact('thanas'));
    }

    public function create()
    {
        $districts = District::where('status', '=', 1)->orderBy('name')->get(['id', 'name']);
        return view('admin.thana.create', compact('districts'));
    }

    public function store(Request $request)
    {
        // ✅ 1. Validate request data
        $request->validate([
            'district_id' => 'required|exists:districts,id', // Division ID must exist
            'name'        => 'required|string|max:255|unique:districts,name',
        ]);

        // ✅ 2. Generate slug
        $slug = Str::slug($request->name);

        // Ensure slug uniqueness
        $count = Thana::where('slug', 'LIKE', "{$slug}%")->count();
        if ($count > 0) {
            $slug = "{$slug}-" . ($count + 1);
        }

        // ✅ 3. Create district
        Thana::create([
            'district_id' => $request->district_id,
            'name'        => $request->name,
            'slug'        => $slug,
        ]);

        // ✅ 4. Redirect with success message
        return redirect()->back()->with('success', 'Thana created successfully!');
    }

    public function edit($id)
    {
        $thana  = Thana::findOrFail($id);
        $districts = District::where('status', '=', 1)->orderBy('name')->get(['id', 'name']);
        return view('admin.thana.edit', compact('thana', 'districts'));
    }

    public function update(Request $request, $id)
    {
        // ✅ 1. Validate request data
        $request->validate([
            'district_id' => 'required|exists:districts,id', // Must be a valid division ID
            'name' => 'required|string|max:255|unique:districts,name,' . $id, // Ignore current record for uniqueness
        ]);

        // ✅ 2. Find the existing district
        $district = Thana::findOrFail($id);

        // ✅ 3. Generate new slug from name
        $slug = Str::slug($request->name);

        // Ensure unique slug (avoid duplicate slugs)
        $count = Thana::where('slug', 'LIKE', "{$slug}%")
            ->where('id', '!=', $id)
            ->count();

        if ($count > 0) {
            $slug = "{$slug}-" . ($count + 1);
        }

        // ✅ 4. Update the district
        $district->update([
            'district_id' => $request->district_id,
            'name'        => $request->name,
            'slug'        => $slug,
        ]);

        // ✅ 5. Redirect back with success message
        return redirect()->back()->with('success', 'Thana updated successfully!');
    }

    public function toggleStatus($id)
    {
        $store = Thana::findOrFail($id);
        $store->status = $store->status == 1 ? 0 : 1;
        $store->save();

        return redirect()->back()->with('success', 'Status updated successfully.');
    } ## End Mehtod

    public function destroy($id)
    {
        // ✅ 1. Find the division by ID
        $division = Thana::findOrFail($id);

        // ✅ 2. Delete the record
        $division->delete();

        // ✅ 3. Redirect back with success message
        return redirect()->back()->with('success', 'Thana deleted successfully!');
    }
}
