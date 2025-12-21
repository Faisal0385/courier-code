<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // For slug generation

class DivisionController extends Controller
{
    public function index(Request $request)
    {
        $divisions = Division::query()
            ->when($request->filled('search'), fn($q) =>
            $q->where('name', 'like', '%' . $request->search . '%'))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.division.index', compact('divisions'));
    }

    public function create()
    {
        return view('admin.division.create');
    }

    public function store(Request $request)
    {
        // ✅ 1. Validate input
        $request->validate([
            'name' => 'required|string|max:255|unique:divisions,name',
        ]);

        // ✅ 2. Create slug from name
        $slug = Str::slug($request->name);

        // If slug already exists, append a number
        $count = Division::where('slug', 'LIKE', "{$slug}%")->count();
        if ($count > 0) {
            $slug = "{$slug}-" . ($count + 1);
        }

        // ✅ 3. Create new Division
        Division::create([
            'name' => $request->name,
            'slug' => $slug,
        ]);

        // ✅ 4. Redirect with success message
        return redirect()->back()->with('success', 'Division created successfully!');
    }

    public function edit($id)
    {
        $division = Division::findOrFail($id);
        return view('admin.division.edit', compact('division'));
    }

    public function update(Request $request, $id)
    {
        // ✅ 1. Validate input
        $request->validate([
            'name' => 'required|string|max:255|unique:divisions,name,' . $id,
        ]);

        // ✅ 2. Find the division
        $division = Division::findOrFail($id);

        // ✅ 3. Generate new slug from name
        $slug = Str::slug($request->name);

        // Ensure slug uniqueness
        $count = Division::where('slug', 'LIKE', "{$slug}%")
            ->where('id', '!=', $id)
            ->count();
        if ($count > 0) {
            $slug = "{$slug}-" . ($count + 1);
        }

        // ✅ 4. Update the division
        $division->update([
            'name' => $request->name,
            'slug' => $slug,
        ]);

        // ✅ 5. Redirect with success message
        return redirect()->back()->with('success', 'Division updated successfully!');
    }

    public function toggleStatus($id)
    {
        $store = Division::findOrFail($id);
        $store->status = $store->status == 1 ? 0 : 1;
        $store->save();

        return redirect()->back()->with('success', 'Status updated successfully.');
    } ## End Mehtod

    public function destroy($id)
    {
        // ✅ 1. Find the division by ID
        $division = Division::findOrFail($id);

        // ✅ 2. Delete the record
        $division->delete();

        // ✅ 3. Redirect back with success message
        return redirect()->back()->with('success', 'Division deleted successfully!');
    }
}
