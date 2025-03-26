<?php

namespace App\Http\Controllers;

use App\Models\Brief;
use App\Models\Client; // Import the Client model
use App\Models\Item;
use App\Models\Category; // Ensure this is included
use Illuminate\Http\Request;
use Fpdf\Fpdf;


class BriefController extends Controller
{
    public function index()
    {
        // Fetch briefs where status is 0, ordered by start_date descending
        $briefs = Brief::with('category')
            ->where('status', 0)
            ->orderBy('start_date', 'desc')
            ->get();

        // Get the total count of briefs
        $totalBriefs = $briefs->count();    
    
        // Pass the filtered and sorted briefs to the view
        return view('briefs.index', compact('briefs', 'totalBriefs'));
    }
    
    public function allBriefs()
    {
        $briefs = Brief::with('category')->orderBy('start_date', 'desc')->get();

        // Get the total count of briefs
        $totalBriefs = $briefs->count();  
        
        return view('briefs.all', compact('briefs', 'totalBriefs'));
    }

    // Show the form for creating a new brief
    public function create()
    {
        $clients = Client::all(); // Fetch all clients from the Client model
        $industryCategories = Category::where('categoryable_type', 'briefs')->get(); // Fetch all industry categories for briefs

        return view('briefs.create', compact('clients', 'industryCategories')); // Pass clients and categories to the view
    }

    // Store a newly created brief in storage
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'client_id' => 'required|exists:clients,id',
            'category_id' => 'required|exists:categories,id', // Ensure the industry category exists
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'contact_person' => 'nullable|string|max:255',
            'brief_handler' => 'nullable|string|max:255',
            'budget' => 'nullable|numeric',
            'production_cost' => 'nullable|numeric',
            'contract_agreement' => 'nullable|string|max:255',
            'payment_mode' => 'nullable|string|max:255',
            'transaction_code' => 'nullable|string|max:255',
            'status' => 'nullable|boolean', 
        ]);

        // Create the brief
        Brief::create([
            'name' => $request->name,
            'client_id' => $request->client_id,
            'category_id' => $request->category_id, // Save industry category ID
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'contact_person' => $request->contact_person,
            'brief_handler' => $request->brief_handler,
            'budget' => $request->budget,
            'production_cost' => $request->production_cost,
            'contract_agreement' => $request->contract_agreement,
            'payment_mode' => $request->payment_mode,
            'transaction_code' => $request->transaction_code,
            'status' => $request->status ?? false, // Default to false if not set
        ]);

        return redirect()->route('briefs.index')->with('success', 'Brief added successfully.');
    }

    // Show the form for editing the specified brief
    public function edit($id)
    {
        // Fetch the brief by ID
        $brief = Brief::findOrFail($id);

        // Fetch all clients for the dropdown
        $clients = Client::all();

        // Fetch all industry categories for briefs
        $industryCategories = Category::where('categoryable_type', 'briefs')->get();

        // Pass brief, clients, and categories to the view
        return view('briefs.edit', compact('brief', 'clients', 'industryCategories'));
    }

    // Update the specified brief in storage
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'client_id' => 'required|exists:clients,id',
            'category_id' => 'required|exists:categories,id', // Ensure the industry category exists
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'contact_person' => 'nullable|string|max:255',
            'brief_handler' => 'nullable|string|max:255',
            'budget' => 'nullable|numeric',
            'production_cost' => 'nullable|numeric',
            'contract_agreement' => 'nullable|string|max:255',
            'payment_mode' => 'nullable|string|max:255',
            'transaction_code' => 'nullable|string|max:255',
            'status' => 'nullable|boolean', 
        ]);

        // Find the brief and update it
        $brief = Brief::findOrFail($id);
        $brief->update([
            'name' => $request->name,
            'client_id' => $request->client_id,
            'category_id' => $request->category_id, // Update industry category ID
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'contact_person' => $request->contact_person,
            'brief_handler' => $request->brief_handler,
            'budget' => $request->budget,
            'production_cost' => $request->production_cost,
            'contract_agreement' => $request->contract_agreement,
            'payment_mode' => $request->payment_mode,
            'transaction_code' => $request->transaction_code,
            'status' => $request->status ?? false, // Default to false if not set
        ]);

        return redirect()->route('briefs.index')->with('success', 'Brief updated successfully.');
    }

    public function show($id)
    {
        // Fetch the brief along with the category where categoryable_name is 'briefs'
        $brief = Brief::with(['category' => function ($query) {
            $query->where('categoryable_type', 'briefs'); // Filter categories
        }])->findOrFail($id); // Eager load the category

        return view('briefs.brief', compact('brief'));
    }

    // Remove the specified brief from storage
    public function removeItem($brief_id, $item_id)
    {
        $brief = Brief::findOrFail($brief_id);
        
        // Detach the item
        $brief->items()->detach($item_id);
    
        // Update the budget
        $brief->updateBudget();
    
        return response()->json([
            'success' => true,
            'message' => 'Item removed from the brief successfully. Budget updated.',
        ]);
    }
    

    public function items($brief_id)
    {
        $brief = Brief::findOrFail($brief_id);
        $items = Item::orderBy('name', 'asc')->get();
        return view('briefs.items')->with([
            'items' => $items,
            'brief' => $brief
        ]);
    }

    public function storeItem(Request $request, $brief_id, $client_id = null)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);
    
        $brief = Brief::findOrFail($brief_id);
    
        // Attach the item with quantity and price to the pivot table
        $brief->items()->attach($request->item_id, [
            'quantity' => $request->quantity,
            'price' => $request->price
        ]);
    
        // Update the budget
        $brief->updateBudget();
    
        return response()->json([
            'success' => true,
            'message' => 'Item attached to the brief successfully. Budget updated.',
        ]);
    }    
    
    

    public function showItems($clientId, $briefId)
    {
        // Retrieve the brief along with its associated items
        $brief = Brief::with('items')->findOrFail($briefId);
    
        // Optional: Validate that the client owns the brief
        $client = Client::findOrFail($clientId);
        if ($brief->client_id != $clientId) {
            abort(404, 'Brief not found for the given client.');
        }
    
        // Get the items associated with the brief
        $items = $brief->items; // Corrected relationship name to `items`
    
        // Pass both the brief and items to the view
        return view('briefs.brief', compact('brief', 'items', 'client'));
    }



    public function generateBriefPdf($brief_id)
    {
        $brief = Brief::with('client', 'category', 'items')->findOrFail($brief_id);
        
        $pdf = new Fpdf();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(190, 10, 'Brief Details', 0, 1, 'C');
        
        $pdf->SetFont('Arial', '', 12);
        $pdf->Ln(10);
        $pdf->Cell(50, 10, 'Name:', 0, 0);
        $pdf->Cell(100, 10, $brief->name, 0, 1);
        $pdf->Cell(50, 10, 'Client:', 0, 0);
        $pdf->Cell(100, 10, $brief->client->name, 0, 1);
        $pdf->Cell(50, 10, 'Category:', 0, 0);
        $pdf->Cell(100, 10, $brief->category->name, 0, 1);
        $pdf->Cell(50, 10, 'Start Date:', 0, 0);
        $pdf->Cell(100, 10, $brief->start_date, 0, 1);
        $pdf->Cell(50, 10, 'End Date:', 0, 0);
        $pdf->Cell(100, 10, $brief->end_date, 0, 1);
        
        $pdf->Ln(10);
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(190, 10, 'Items', 0, 1, 'C');
        
        $pdf->SetFont('Arial', '', 12);
        foreach ($brief->items as $item) {
            $pdf->Cell(50, 10, $item->name, 0, 0);
            $pdf->Cell(50, 10, 'Qty: ' . $item->pivot->quantity, 0, 0);
            $pdf->Cell(50, 10, 'Price: ' . number_format($item->pivot->price, 2), 0, 1);
        }
        
        $pdf->Output('D', 'Brief_' . $brief->id . '.pdf');
        exit;
    }


}