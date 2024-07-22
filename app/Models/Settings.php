<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag',
        'meta_keywords',
        'wa_numbers',
        'wa_message',
        'additional_meta',
    ];
}
