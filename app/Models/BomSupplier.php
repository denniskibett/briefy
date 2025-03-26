<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BomSupplier extends Model
{
    use HasFactory;

    protected $table = 'bom_suppliers';

    protected $fillable = ['bom_id', 'supplier_id', 'unit_cost']; // Adjust as necessary

    // Define the relationship with Bom
    public function bom()
    {
        return $this->belongsTo(Bom::class, 'bom_id');
    }

    // Relationship with Supplier
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    // Relationship with Item through BomSupplierItem
    public function bomSupplierItems()
    {
        return $this->hasMany(BomSupplierItem::class, 'bom_supplier_id');
    }
}
