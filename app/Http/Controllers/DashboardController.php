<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Brief;
use App\Models\Item;
use App\Models\Bom;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch total counts
        $totalClients = Client::count();
        $totalBriefs = Brief::count();
        $totalItems = Item::count();
        $totalBoms = Bom::count();

        // Debugging output
        // dd($totalClients, $totalBriefs, $totalItems, $totalBoms);

        // Fetch counts for the current week
        $clientsAddedThisWeek = Client::where('created_at', '>=', now()->startOfWeek())->count();
        $briefsAddedThisWeek = Brief::where('created_at', '>=', now()->startOfWeek())->count();
        $itemsAddedThisWeek = Item::where('created_at', '>=', now()->startOfWeek())->count();
        $bomsAddedThisWeek = Bom::where('created_at', '>=', now()->startOfWeek())->count();

        // Calculate percentages
        $clientsAddedPercentage = $totalClients > 0 ? round(($clientsAddedThisWeek / $totalClients) * 100, 2) : 0;
        $briefsAddedPercentage = $totalBriefs > 0 ? round(($briefsAddedThisWeek / $totalBriefs) * 100, 2) : 0;
        $itemsAddedPercentage = $totalItems > 0 ? round(($itemsAddedThisWeek / $totalItems) * 100, 2) : 0;
        $bomsAddedPercentage = $totalBoms > 0 ? round(($bomsAddedThisWeek / $totalBoms) * 100, 2) : 0;

        // Pass data to the view
        return view('dashboard', compact(
            'totalClients',
            'totalBriefs',
            'totalItems',
            'totalBoms',
            'clientsAddedThisWeek',
            'briefsAddedThisWeek',
            'itemsAddedThisWeek',
            'bomsAddedThisWeek',
            'clientsAddedPercentage',
            'briefsAddedPercentage',
            'itemsAddedPercentage',
            'bomsAddedPercentage'
        ));
    }
}