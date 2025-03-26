<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact_name',
        'address',
        'location',
        'phone',
        'email',
        'category_id',
        'tax_pin',
        'status',
    ];
    public function brief(){
        return $this->hasMany(Brief::class);
    }
    // Client.php
    public function briefs()
    {
        return $this->hasMany(Brief::class);
    }

    // In App\Models\Client.php

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
