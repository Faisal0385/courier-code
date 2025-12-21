<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Hub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HubController extends Controller
{
    /**
     * Display a listing of categories with optional search.
     */
    public function index(Request $request)
    {
        $hubs = Hub::query()
            ->when($request->filled('search'), function ($q) use ($request) {
                $search = $request->search;
                $q->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('location', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%");
                });
            })
            ->where('user_id', '=', Auth::user()->id)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.hub.index', compact('hubs'));
    }

    /**
     * Show the form for creating.
     */
    public function create()
    {
        return view('admin.hub.create');
    }


    /**
     * Store a new.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255|unique:hubs,name',
            'phone'    => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'address'  => 'required|string|max:255',
        ]);

        $data = [
            'user_id'  => Auth::user()->id,
            'name'     => $validated['name'],
            'phone'    => $validated['phone'],
            'location' => $validated['location'],
            'address'  => $validated['address'],
        ];

        Hub::create($data);

        return back()->with('success', 'Hub added successfully.');
    }

    /**
     * Show the form for editing.
     */
    public function edit($id)
    {
        $hub = Hub::findOrFail($id);
        return view('admin.hub.edit', compact('hub'));
    }

    /**
     * Update an existing.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255|unique:hubs,name',
            'phone'    => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'address'  => 'required|string|max:255',
        ]);

        $hub           = Hub::findOrFail($id);
        $hub->name     = $validated['name'];
        $hub->phone    = $validated['phone'];
        $hub->location = $validated['location'];
        $hub->address  = $validated['address'];

        $hub->save();

        return back()->with('success', 'Hub updated successfully.');
    }























    /**
     * Delete.
     */
    public function destroy(Request $request)
    {
        $hub = Hub::findOrFail($request->id);
        $hub->delete();

        return redirect()->route('admin.hub.index')->with('success', 'Hub deleted successfully.');
    }

    /**
     * Toggle the status of a category.
     */
    public function toggleStatus($id)
    {
        $hub = Hub::findOrFail($id);
        $hub->status = !$hub->status;
        $hub->save();

        return back()->with('success', 'Hub status updated.');
    }
}
