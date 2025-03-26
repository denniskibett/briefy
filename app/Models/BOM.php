<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BOM extends Model
{
    use HasFactory;

    protected $table = 'bom';

    protected $fillable = ['item_id', 'category_id', 'name', 'quantity', 'unit_cost', 'total_cost'];

    // Relationship to the Item model
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
       

    // Relationship to the BomSupplier model
    public function bomSuppliers()
    {
        return $this->hasMany(BomSupplier::class); // Assuming a BOM can have multiple suppliers
    }

    // Relationship to the BomSupplierItem model
    public function bomSupplierItems()
    {
        return $this->hasMany(BomSupplierItem::class); // Assuming a BOM can have multiple supplier items
    }

    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class, 'bom_suppliers')
                    ->withPivot('unit_cost', 'quantity', 'total_cost')
                    ->withTimestamps();
    }
    
}