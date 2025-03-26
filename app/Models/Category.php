<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'categoryable_type',
        'categoryable_id',
    ];

    // Define relationships if needed
    public function clients()
    {
        return $this->hasMany(Client::class, 'category_id');
    }
    
    public function briefs()
    {
        return $this->hasMany(Brief::class, 'category_id');
    }

    
}