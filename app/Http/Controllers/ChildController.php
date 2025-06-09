<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Child;

class ChildController extends Controller
{
    // Show form to create a child
    public function create()
    {
        return view('children.create');
    }

    // Store a new child
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|string|max:20',
        ]);

        Child::create($validated);

        return redirect()->route('children.create')->with('success', 'تم حفظ البيانات بنجاح.');
    }

    // List all children
    public function index()
    {
        $children = Child::latest()->paginate(10);
        return view('children.index', compact('children'));
    }

    // Show a specific child
    public function show($id)
    {
        $child = Child::findOrFail($id);
        return view('children.show', compact('child'));
    }

    // Show form to edit a child
    public function edit($id)
    {
        $child = Child::findOrFail($id);
        return view('children.edit', compact('child'));
    }

    // Update a child
    public function update(Request $request, $id)
    {
        $child = Child::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|string|max:20',
        ]);
        $child->update($validated);

        return redirect()->route('children.show', $child->id)->with('success', 'تم تحديث البيانات بنجاح.');
    }

    // Delete a child
    public function destroy($id)
    {
        $child = Child::findOrFail($id);
        $child->delete();

        return redirect()->route('children.index')->with('success', 'تم حذف الطفل بنجاح.');
    }
}
