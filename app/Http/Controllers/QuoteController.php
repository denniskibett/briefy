<?php

namespace App\Http\Controllers;

use App\Models\Brief;
use App\Models\Item;
use App\Models\Client;
use App\Models\Company;
use App\Models\User;
use App\Models\Quote;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class QuoteController extends Controller
{
    public function create(Brief $brief)
    {
        // Get the client, company, and items associated with the brief
        $client = $brief->client;
        $company = $brief->company;
        $items = $brief->items;

        return view('quotes.create', compact('brief', 'client', 'company', 'items'));
    }

    public function store(Request $request, Brief $brief)
    {
        // Store the quote in the database
        $quote = new Quote();
        $quote->brief_id = $brief->id;
        $quote->client_id = $brief->client_id;
        $quote->company_id = $brief->company_id;
        $quote->date_prepared = now();
        $quote->save();
    
        // Send quote email to the client
        $this->sendQuoteEmail($quote);
    
        // Generate PDF of the quote
        $pdf = $this->generatePdf($quote);
        
        // Download PDF
        return $pdf->download('quote_' . $quote->id . '.pdf');
    }
    

    public function sendQuoteEmail($quote)
    {
        $client = $quote->client;
        $company = $quote->company;
        $user = auth()->user();

        Mail::to($client->email)->send(new QuoteMail($quote, $client, $company, $user));
    }

    public function generatePdf($quote)
    {
        $client = $quote->client;
        $company = $quote->company;
        $items = $quote->brief->items;

        $pdf = PDF::loadView('quotes.pdf', compact('quote', 'client', 'company', 'items'));

        return $pdf;
    }

    public function show($id)
    {
        // Display the quote/invoice view
        $quote = Quote::findOrFail($id);
        return view('quotes.show', compact('quote'));
    }

    public function edit($id)
    {
        // Edit the quote details
        $quote = Quote::findOrFail($id);
        return view('quotes.edit', compact('quote'));
    }

    public function update(Request $request, $id)
    {
        $quote = Quote::findOrFail($id);
        $quote->update($request->all());

        return redirect()->route('quotes.show', $quote->id)->with('success', 'Quote updated successfully');
    }

    public function destroy($id)
    {
        $quote = Quote::findOrFail($id);
        $quote->delete();

        return redirect()->route('quotes.index')->with('success', 'Quote deleted successfully');
    }
}
