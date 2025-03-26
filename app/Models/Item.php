<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'unit', 'MOU', 'category_id']; // Ensure category_id is fillable

    public function suppliers() {
        return $this->belongsToMany(Supplier::class, 'supplier_items')
                    ->withPivot('MOQ', 'quantity', 'cost', 'total', 'time_to_deliver')
                    ->withTimestamps();
    }

    public function bom() {
        return $this->hasMany(BOM::class);
    }

    // Relationship with Briefs through the pivot table
    public function briefs()
    {
        return $this->belongsToMany(Brief::class, 'brief_item')->withPivot('quantity');
    }

    // Relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function bomSupplierItems()
    {
        return $this->hasMany(BomSupplierItem::class, 'item_id');
    }

    public function bomSupplier()
    {
        return $this->belongsTo(BomSupplier::class, 'bom_supplier_id');
    }

    public function bomSuppliers()
    {
        return $this->hasMany(BomSupplier::class);
    }
    
}