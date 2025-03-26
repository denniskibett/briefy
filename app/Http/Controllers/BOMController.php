<?php

namespace App\Http\Controllers;

use App\Models\BOM;
use App\Models\Item;
use App\Models\Category; 
use Illuminate\Http\Request;

class BOMController extends Controller
{
    public function index()
    {
        // Fetch BOM entries with their associated items and categories
        $boms = BOM::with(['item', 'category'])->get(); // Ensure 'category' is used instead of 'Category'

        // Get the total count of items
        $totalBOMs= $boms->count();  
        return view('bom.index', compact('boms', 'totalBOMs')); // Pass $boms to the view
    }

    public function create()
    {
        // Get all items for the form
        $items = Item::all();
        
        // Fetch categories of categoryable type 'bom'
        $bomCategories = Category::where('categoryable_type', 'bom')->get(); // Filter categories

        return view('bom.create', compact('items', 'bomCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255', // Ensure this validation is present
            'quantity' => 'required|integer|min:1',
            'unit_cost' => 'required|numeric|min:0',
        ]);
    
        // Calculate total cost
        $totalCost = $request->quantity * $request->unit_cost;
    
        // Create a new BOM entry
        $bom = BOM::create([
            'item_id' => $request->item_id,
            'category_id' => $request->category_id,
            'name' => $request->name, 
            'quantity' => $request->quantity,
            'unit_cost' => $request->unit_cost,
            'total_cost' => $totalCost,
        ]);
    
        return redirect()->route('bom.index')->with('success', 'BOM created successfully.');
    }

    public function update(Request $request, BOM $bom)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'category_id' => 'required|exists:categories,id', // Validate the new field
            'name' => 'required|string|max:255', // Validate the name field
            'quantity' => 'required|integer|min:1',
            'unit_cost' => 'required|numeric|min:0',
        ]);

        // Calculate total cost
        $totalCost = $request->quantity * $request->unit_cost;

        // Update the existing BOM entry
        $bom->update([
            'item_id' => $request->item_id,
            'category_id' => $request->category_id, // Update the new field
            'name' => $request->name,
            'quantity' => $request->quantity,
            'unit_cost' => $request->unit_cost,
            'total_cost' => $totalCost, 
        ]);

        return redirect()->route('bom.index')->with('success', 'BOM updated successfully.');
    }

    public function edit(BOM $bom)
    {
        // Get all items for the edit form
        $items = Item::all();
        
        // Fetch categories of categoryable type 'bom'
        $bomCategories = Category::where('categoryable_type', 'bom')->get(); // Filter categories

        return view('bom.edit', compact('bom', 'items', 'bomCategories'));
    }

    public function destroy(BOM $bom)
    {
        // Delete the BOM entry
        $bom->delete();
        return redirect()->route('bom.index')->with('success', 'BOM deleted successfully.');
    }
}