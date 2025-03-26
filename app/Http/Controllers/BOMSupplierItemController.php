<?php

namespace App\Http\Controllers;

use App\Models\BomSupplierItem;
use App\Models\BomSupplier;
use App\Models\Item;
use Illuminate\Http\Request;

class BomSupplierItemController extends Controller
{
    // Create method
    public function create($client_id, $brief_id, $item_id)
    {
        // Fetch all BomSuppliers with BoM info
        $bomSuppliers = BomSupplier::with('bom')->get(); // Include BoM relationship

        // Fetch the specific Item
        $item = Item::findOrFail($item_id);

        return view('bom_supplier_items.create', compact('bomSuppliers', 'item', 'client_id', 'brief_id'));
    }

    public function addSupplier($item_id)
    {
        // Fetch all BomSuppliers with BoM info and include supplier name
        $bomSuppliers = BomSupplier::with(['bom', 'supplier'])->get(); // Ensure 'supplier' relationship exists
    
        // Fetch the specific Item
        $item = Item::findOrFail($item_id);
    
        return view('bom_supplier_items.add', compact('bomSuppliers', 'item'));
    }
    
    

    // Store method
    public function store(Request $request)
    {
        $request->validate([
            'bom_supplier_id' => 'required|exists:bom_suppliers,id',
            'item_id' => 'required|exists:items,id',
        ]);

        // Check if the combination already exists
        $existingItem = BomSupplierItem::where('bom_supplier_id', $request->bom_supplier_id)
                                        ->where('item_id', $request->item_id)
                                        ->first();

        if ($existingItem) {
            return redirect()->back()->withErrors('This BoM Supplier Item already exists.');
        }

        // Fetch the selected BomSupplier to validate BoM info
        $bomSupplier = BomSupplier::findOrFail($request->bom_supplier_id);

        // Optionally, add validation for specific BoM conditions
        if (!$bomSupplier->bom) {
            return redirect()->back()->withErrors('The selected supplier does not have valid BoM information.');
        }

        // Save the BoM Supplier Item
        BomSupplierItem::create([
            'bom_supplier_id' => $bomSupplier->id,
            'item_id' => $request->item_id,
            'bom_info' => $bomSupplier->bom->info ?? null, // Example of saving BoM-specific data
        ]);

        return redirect()->back()->with('success', 'BoM Supplier Item created successfully.');
    }

    // Update method
    public function update(Request $request, BomSupplierItem $bomSupplierItem)
    {
        $request->validate([
            'bom_supplier_id' => 'required|exists:bom_suppliers,id',
            'item_id' => 'required|exists:items,id',
        ]);

        // Fetch the selected BomSupplier to validate BoM info
        $bomSupplier = BomSupplier::findOrFail($request->bom_supplier_id);

        // Optionally, add validation for specific BoM conditions
        if (!$bomSupplier->bom) {
            return redirect()->back()->withErrors('The selected supplier does not have valid BoM information.');
        }

        // Update the BoM Supplier Item
        $bomSupplierItem->update([
            'bom_supplier_id' => $bomSupplier->id,
            'item_id' => $request->item_id,
            'bom_info' => $bomSupplier->bom->info ?? null, // Example of saving BoM-specific data
        ]);

        return redirect()->back()->with('success', 'BoM Supplier Item updated successfully.');
    }

    // Destroy method
    public function destroy(BomSupplierItem $bomSupplierItem)
    {
        // Debugging: Log the ID of the item being deleted
        \Log::info('Deleting BomSupplierItem with ID: ' . $bomSupplierItem->id);
    
        // Delete the BoM Supplier Item
        $bomSupplierItem->delete();
    
        return redirect()->back()->with('success', 'BoM Supplier Item deleted successfully.');
    }
}