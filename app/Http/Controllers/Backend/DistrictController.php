<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // For slug generation

class DistrictController extends Controller
{
    public function index(Request $request)
    {
        $districts = District::query()
            ->when($request->filled('search'), fn($q) =>
            $q->where('name', 'like', '%' . $request->search . '%'))
            ->latest()
            ->orderBy('division_id')
            ->paginate(20)
            ->withQueryString();

        return view('admin.district.index', compact('districts'));
    }

    public function create()
    {
        $divisions = Division::where('status', '=', 1)->orderBy('name')->get(['id', 'name']);
        return view('admin.district.create', compact('divisions'));
    }

    public function store(Request $request)
    {
        // ✅ 1. Validate request data
        $request->validate([
            'division_id' => 'required|exists:divisions,id', // Division ID must exist
            'name'        => 'required|string|max:255|unique:districts,name',
        ]);

        // ✅ 2. Generate slug
        $slug = Str::slug($request->name);

        // Ensure slug uniqueness
        $count = District::where('slug', 'LIKE', "{$slug}%")->count();
        if ($count > 0) {
            $slug = "{$slug}-" . ($count + 1);
        }

        // ✅ 3. Create district
        District::create([
            'division_id' => $request->division_id,
            'name'        => $request->name,
            'slug'        => $slug,
        ]);

        // ✅ 4. Redirect with success message
        return redirect()->back()->with('success', 'District created successfully!');
    }

    public function edit($id)
    {
        $district  = District::findOrFail($id);
        $divisions = Division::where('status', '=', 1)->orderBy('name')->get(['id', 'name']);
        return view('admin.district.edit', compact('district', 'divisions'));
    }

    public function update(Request $request, $id)
    {
        // ✅ 1. Validate request data
        $request->validate([
            'division_id' => 'required|exists:divisions,id', // Must be a valid division ID
            'name' => 'required|string|max:255|unique:districts,name,' . $id, // Ignore current record for uniqueness
        ]);

        // ✅ 2. Find the existing district
        $district = District::findOrFail($id);

        // ✅ 3. Generate new slug from name
        $slug = Str::slug($request->name);

        // Ensure unique slug (avoid duplicate slugs)
        $count = District::where('slug', 'LIKE', "{$slug}%")
            ->where('id', '!=', $id)
            ->count();

        if ($count > 0) {
            $slug = "{$slug}-" . ($count + 1);
        }

        // ✅ 4. Update the district
        $district->update([
            'division_id' => $request->division_id,
            'name'        => $request->name,
            'slug'        => $slug,
        ]);

        // ✅ 5. Redirect back with success message
        return redirect()->back()->with('success', 'District updated successfully!');
    }

    public function toggleStatus($id)
    {
        $store = District::findOrFail($id);
        $store->status = $store->status == 1 ? 0 : 1;
        $store->save();

        return redirect()->back()->with('success', 'Status updated successfully.');
    } ## End Mehtod

    public function destroy($id)
    {
        // ✅ 1. Find the division by ID
        $division = District::findOrFail($id);

        // ✅ 2. Delete the record
        $division->delete();

        // ✅ 3. Redirect back with success message
        return redirect()->back()->with('success', 'Division deleted successfully!');
    }
}
