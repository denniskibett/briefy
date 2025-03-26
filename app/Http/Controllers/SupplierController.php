<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Category;
use App\Models\BomSupplier;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();

        // Get the total count of items
        $totalSuppliers = $suppliers->count();  

        return view('suppliers.index', compact('suppliers', 'totalSuppliers'));
    }

    
    public function create()
    {
        // Fetch categories where categoryable_name is 'items'
        $categories = Category::where('categoryable_type', 'suppliers')->get();

        // Pass the categories to the view
        return view('suppliers.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'contact_name' => 'required',
            'address' => 'required',
            'location' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:suppliers',
            'category_id' => 'required|exists:categories,id', // Ensure category_id exists in categories table
            'tax_pin' => 'required',
        ]);

        Supplier::create($request->all());
        return redirect()->route('suppliers.index')->with('success', 'Supplier created successfully.');
    }

    public function show($id)
    {
        // Eager load the bom relationship
        $supplier = Supplier::with('bomSuppliers.bom')->findOrFail($id);
        
        return view('suppliers.show', compact('supplier'));
    }

    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'contact_name' => 'required',
            'address' => 'required',
            'location' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email|unique:suppliers,email,' . $supplier->id,
            'industry_category' => 'required',
            'tax_pin' => 'required',
        ]);

        $supplier->update($request->all());
        return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully.');
    }

 

}
