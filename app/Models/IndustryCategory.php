<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndustryCategory extends Model
{
    use HasFactory;

    // Fillable fields for mass assignment
    protected $fillable = ['name'];

    // Relationship with Brief model
    public function briefs()
    {
        return $this->hasMany(Brief::class);
    }
}
