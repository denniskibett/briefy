<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Bom;
use App\Models\BomSupplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BOMSupplierController extends Controller
{

    public function index($bom_id)
    {
        // Fetch BOM details to get the name
        $bom = DB::table('bom')->where('id', $bom_id)->first();
    
        // If BOM is not found, return an error
        if (!$bom) {
            return redirect()->back()->with('error', 'BOM not found');
        }
    
        $suppliers = DB::table('bom_suppliers')
            ->join('suppliers', 'bom_suppliers.supplier_id', '=', 'suppliers.id')
            ->where('bom_suppliers.bom_id', $bom_id)
            ->select('suppliers.*')
            ->get();
    
        // Pass the BOM name to the view
        return view('bom_suppliers.index', compact('suppliers', 'bom_id', 'bom'))->with('bom_name', $bom->name);
    }
    
    
    

    public function create(Supplier $supplier)
    {
        $boms = Bom::all(); // Fetch all BOMs
        return view('bom_suppliers.create', compact('supplier', 'boms'));
    }

    public function store(Request $request, Supplier $supplier)
    {
        $request->validate([
            'bom_id' => 'required|exists:bom,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'unit_cost' => 'required|numeric',
            'quantity' => 'required|integer',
            'total_cost' => 'required|numeric',
        ]);
    
        $supplier->boms()->attach($request->bom_id, [
            'unit_cost' => $request->unit_cost,
            'quantity' => $request->quantity,
            'total_cost' => $request->total_cost,
        ]);
        
        return redirect()->route('suppliers.show', $supplier)->with('success', 'BOM assigned to supplier successfully.');
    }
    
    public function edit(Supplier $supplier, $bomId)
    {
        $bomAssignment = $supplier->boms()->wherePivot('bom_id', $bomId)->first();
        $boms = Bom::all();
    
        return view('bom_suppliers.edit', compact('supplier', 'bomAssignment', 'boms'));
    }

    public function update(Request $request, Supplier $supplier, $bomId)
    {
        $request->validate([
            'bom_id' => 'required|exists:bom,id',
            'unit_cost' => 'required|numeric',
            'quantity' => 'required|integer',
            'total_cost' => 'required|numeric',
        ]);
    
        $supplier->boms()->updateExistingPivot($bomId, [
            'bom_id' => $request->bom_id,
            'unit_cost' => $request->unit_cost,
            'quantity' => $request->quantity,
            'total_cost' => $request->total_cost,
        ]);
    
        return redirect()->route('suppliers.show', $supplier)->with('success', 'BOM assignment updated successfully.');
    }

    
    public function destroy(Supplier $supplier, $bomId)
    {
        // Detach the BOM from the supplier
        $supplier->boms()->detach($bomId);
    
        // Redirect back to the supplier's details page with a success message
        return redirect()->route('suppliers.show', $supplier)->with('success', 'BOM removed from supplier successfully.');
    }

    public function show(Supplier $supplier)
    {
        // Fetch BOMs related to the supplier
        $boms = $supplier->boms;
    
        // Get the BOM supplier entries for the supplier
        $bomSuppliers = $supplier->bomSuppliers; // Ensure this relationship exists
    
        // Get the IDs of items in bom_supplier_items and fetch associated clients
        $clientIds = DB::table('bom_supplier_items')
            ->join('bom_suppliers', 'bom_supplier_items.bom_supplier_id', '=', 'bom_suppliers.id')
            ->whereIn('bom_suppliers.id', $bomSuppliers->pluck('id')->toArray()) // Ensure an array is passed
            ->pluck('bom_supplier_items.item_id')
            ->toArray(); // Convert to array
    
        // Get brief_item entries to get the brief IDs that are linked to client IDs
        $briefIds = DB::table('brief_item')
            ->whereIn('item_id', $clientIds)
            ->pluck('brief_id')
            ->toArray();
    
        // Get clients who purchased these items (from the briefs table using brief_id to client_id mapping)
        $clients = DB::table('briefs')
            ->whereIn('id', $briefIds)
            ->pluck('client_id')
            ->toArray();
    
        // Now fetch the clients themselves
        $clientDetails = DB::table('clients')
            ->whereIn('id', $clients)
            ->get(); // Get the client details
    
        // Ensure it's a collection to prevent null issues
        $clientDetails = collect($clientDetails);
    
        // Return the view with suppliers, BOMs, and clients
        return view('suppliers.bom', compact('supplier', 'boms', 'clientDetails'));
    }    
    
        
}