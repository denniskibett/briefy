<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'contact_name', 'address', 'location', 'phone', 'email', 'category_id', 'tax_pin'];

    public function items() {
        return $this->belongsToMany(Item::class, 'supplier_items')
                    ->withPivot('MOQ', 'quantity', 'cost', 'total', 'time_to_deliver')
                    ->withTimestamps();
    }

    public function bom()
    {
        return $this->belongsTo(Bom::class, 'bom_id');
    }

    public function boms()
    {
        return $this->belongsToMany(Bom::class, 'bom_suppliers', 'supplier_id', 'bom_id')
                    ->withPivot('unit_cost', 'quantity', 'total_cost')
                    ->withTimestamps();
    }
    

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function bomSuppliers()
    {
        return $this->hasMany(BomSupplier::class, 'supplier_id');
    }

    public function bomSupplierItems()
    {
        return $this->hasMany(BomSupplier::class, 'supplier_id');
    }
}
