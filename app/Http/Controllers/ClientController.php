<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Brief;
use App\Models\Category; // Make sure to import the Category model
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        // Fetch only active clients that have at least one brief, sorting clients by the most recent brief
        $clients = Client::whereHas('briefs', function($query) {
                $query->where('status', 1); // Ensure briefs are open
            })
            ->with(['briefs' => function($query) {
                $query->where('status', 1)
                      ->orderBy('start_date', 'desc'); // Order briefs by most recent start date
            }])
            ->where('status', 1) // Only active clients
            ->orderByDesc(
                Brief::select('start_date')
                    ->whereColumn('client_id', 'clients.id')
                    ->orderByDesc('start_date')
                    ->limit(1)
            ) // Order clients by their most recent brief
            ->get();
    
        return view('clients.index', compact('clients'));
    }
    

    // Show the form for creating a new client
    public function create()
    {
        // Fetch categories where categoryable_type is 'clients'
        $categories = Category::where('categoryable_type', 'clients')->get();

        return view('clients.create', compact('categories'));
    }

    // Store a newly created client in storage
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:clients',
            'category_id' => 'required|exists:categories,id', // Validate category_id
            'tax_pin' => 'required|string|max:100',
            'status' => 'required|string|max:100',
        ]);

        // Create the client
        Client::create([
            'name' => $request->name,
            'contact_name' => $request->contact_name,
            'address' => $request->address,
            'location' => $request->location,
            'phone' => $request->phone,
            'email' => $request->email,
            'category_id' => $request->category_id, // Store the category_id
            'tax_pin' => $request->tax_pin,
            'status'=>$request->status,
        ]);

        return redirect()->route('clients.index')->with('success', 'Client added successfully.');
    }

    // Show the form for editing a specific client
    public function edit($id)
    {
        $client = Client::findOrFail($id); // Fetch the client or fail if not found
        $categories = Category::where('categoryable_type', 'clients')->get(); // Fetch categories

        return view('clients.edit', compact('client', 'categories')); // Pass categories to the view
    }

    // Update a specific client in storage
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:clients,email,' . $id, // Exclude current email from uniqueness check
            'category_id' => 'required|exists:categories,id', // Validate category_id
            'tax_pin' => 'required|string|max:100', // Removed duplicate tax_pin validation
            'status' => 'required|boolean', // Ensure status is either 1 (active) or 0 (inactive)
        ]);
    
        // Find the client and update it
        $client = Client::findOrFail($id);
        $client->update([
            'name' => $request->name,
            'contact_name' => $request->contact_name,
            'address' => $request->address,
            'location' => $request->location,
            'phone' => $request->phone,
            'email' => $request->email,
            'category_id' => $request->category_id,
            'tax_pin' => $request->tax_pin,
            'status' => $request->status, // Ensure status is updated correctly
        ]);
    
        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }
    


    public function destroy($id)
    {
        $client = Client::findOrFail($id); // Fetch the client or fail if not found
        $client->delete(); // Delete the client

        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }


    // Show the details of a specific client
    public function show($id)
    {
        $client = Client::with(['brief'])->findOrFail($id);
       
        return view('clients.client')->with([
            'client' => $client
        ]);
    }

    // Fetch clients with their brief count and sum of budgets where status is 1
    public function totalBriefs()
    {
        $clients = Client::where('status', 1)
            ->with(['briefs' => function ($query) {
                $query->where('status', 0)
                      ->orderBy('start_date', 'desc'); 
            }])
            ->withCount(['briefs' => function ($query) {
                $query->where('status', 0);
            }])
            ->withSum(['briefs as total_budget' => function ($query) {
                $query->where('status', 0);
            }], 'budget')
            ->orderByDesc('total_budget') // Order by total budget descending
            ->get();

            $totalClients = $clients->count();
            $totalBudget = $clients->sum('total_budget');
        
            return view('clients.index', compact('clients', 'totalClients', 'totalBudget'));
    }
    

    public function allTotalBriefs()
    {
        $clients = Client::with(['briefs' => function ($query) {
            $query->orderBy('start_date', 'desc'); // Show all briefs, sorted by start_date
        }])
        ->withCount('briefs')
        ->withSum('briefs', 'budget')
        ->orderByDesc('briefs_sum_budget') 
        ->get();

        $totalClients = $clients->count();
        $totalBudget = $clients->sum('total_budget');

        return view('clients.all', compact('clients', 'totalClients', 'totalBudget'));
    }

}