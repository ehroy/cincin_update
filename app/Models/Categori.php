<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categori extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'active',
    ];
    public function product():HasMany
    {
        return $this->hasMany(Product::class);
    }
}
