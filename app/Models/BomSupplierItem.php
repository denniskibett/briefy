<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BomSupplierItem extends Model
{
    use HasFactory;

    protected $table = 'bom_supplier_items';

    protected $fillable = ['bom_supplier_id', 'item_id']; // Adjust as necessary

    // Define the relationship with BomSupplier
    public function bomSupplier()
    {
        return $this->belongsTo(BomSupplier::class);
    }

    // Define the relationship with Item
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id'); // Assuming 'item_id' is the foreign key in the 'bom_supplier_items' table
    }
}
