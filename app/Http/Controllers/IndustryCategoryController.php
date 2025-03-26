<?php

namespace App\Http\Controllers;

use App\Models\IndustryCategory;
use Illuminate\Http\Request;

class IndustryCategoryController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $categories = IndustryCategory::all();
        return view('industry_categories.index', compact('categories'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('industry_categories.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = new IndustryCategory();
        $category->name = $request->name;
        $category->save();

        // Optionally, you can return a JSON response or redirect back
        return redirect()->route('industry_categories.index')->with('success', 'Industry category added successfully.');
    }

    // Display the specified resource.
    public function show(IndustryCategory $industryCategory)
    {
        return view('industry_categories.show', compact('industryCategory'));
    }

    // Show the form for editing the specified resource.
    public function edit(IndustryCategory $industryCategory)
    {
        return view('industry_categories.edit', compact('industryCategory'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, IndustryCategory $industryCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $industryCategory->name = $request->name;
        $industryCategory->save();

        return redirect()->route('industry_categories.index')->with('success', 'Industry category updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(IndustryCategory $industryCategory)
    {
        $industryCategory->delete();
        return redirect()->route('industry_categories.index')->with('success', 'Industry category deleted successfully.');
    }
}
