<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Brief;
use App\Models\Client;
use App\Models\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index($client_id, $brief_id)
    {
        // Fetch the brief with its associated items through the pivot table
        $items = Brief::with(['items' => function($query) {
            $query->select('name', 'unit', 'MOU', 'category_id'); // Select necessary columns from items
        }])->findOrFail($brief_id);

        // Fetch the client
        $client = Client::findOrFail($client_id);

        // Get the total count of items
        $totalItems = $items->count();    

        return view('items.index', compact('brief', 'client', 'totalItems'));
    }

    public function items()
    {
        $items = Item::whereHas('category', function ($query) {
            $query->where('categoryable_type', 'items');
        })->get();

        // Get the total count of items
        $totalItems = $items->count();  
    
        return view('items.items', compact('items', 'totalItems'));
    }

    public function itemShow($item_id)
    {
        // Fetch the item along with its category and related BoM data
        $item = Item::with([
            'category',
            'bomSupplierItems.bomSupplier.bom',
            'bomSupplierItems.bomSupplier.supplier'
        ])->findOrFail($item_id);

        return view('items.item', compact('item'));
    }
    

    public function create()
    {
        // Fetch categories where categoryable_name is 'items'
        $categories = Category::where('categoryable_type', 'items')->get();

        // Pass the categories to the view
        return view('items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255', // Ensure name is a string and has a max length
            'unit' => 'required|string|max:50', // Ensure unit is a string and has a max length
            'MOU' => 'required|string|max:255',  // Ensure MOU is validated and has a max length
            'category_id' => 'required|exists:categories,id', // Ensure category_id exists in the categories table
        ]);
    
        // Create the item with the validated data
        Item::create([
            'name' => $request->name,
            'MOU' => $request->MOU,
            'unit' => $request->unit,
            'category_id' => $request->category_id,
        ]);
    
        return redirect()->route('items.index')->with('success', 'Item created successfully.');
    }

    public function show($client_id, $brief_id, $item_id)
    {
        // Fetch the client and brief to ensure they exist
        $client = Client::findOrFail($client_id);
        $brief = Brief::findOrFail($brief_id);

        // Fetch the item along with its category and related BoM data
        $item = Item::with([
            'category',
            'bomSupplierItems.bomSupplier.bom',
            'bomSupplierItems.bomSupplier.supplier',
            'briefs' // Assuming you have a relationship to access brief_item data
        ])->findOrFail($item_id);

        return view('items.index', compact('item', 'client', 'brief'));
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $categories = Category::where('categoryable_type', 'items')->get(); // Filter by categoryable_type

        return view('items.edit', compact('item', 'categories'));
    }


    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required',
            'unit' => 'required',
            'MOU' => 'required',  // Ensure MOU is validated
            'category_id' =>'required',
        ]);

        $item->update($request->all());
        return redirect()->route('items.items')->with('success', 'Item updated successfully.');
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }
}
