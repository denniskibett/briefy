<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brief extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'client_id',
        'category_id',
        'start_date',
        'end_date',
        'contact_person',
        'brief_handler',
        'budget',
        'production_cost',
        'contract_agreement',
        'payment_mode',
        'transaction_code',
        'status',
    ];

    // Relationship with Client
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    // Relationship with Suppliers
    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class)->withPivot('item_id', 'MOQ', 'quantity', 'cost', 'total', 'time_to_deliver');
    }

    // Relationship with Items through the pivot table
    public function items()
    {
        return $this->belongsToMany(Item::class, 'brief_item')->withPivot('quantity', 'price');
    }

    // Relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id'); // Assuming 'category_id' is the foreign key
    }

    // Method to update budget based on pivot table
    public function updateBudget()
    {
        $totalBudget = $this->items->sum(function ($item) {
            return $item->pivot->quantity * $item->pivot->price;
        });

        $this->update(['budget' => $totalBudget]);
    }
}
