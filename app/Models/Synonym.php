<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Synonym extends Model
{
   use HasFactory;

    protected $fillable = [
        'original_word',
        'synonyms',
    ];

    // Kolom synonyms disimpan sebagai array
    protected $casts = [
        'synonyms' => 'array', // Mengkonversi kolom json menjadi array PHP
    ];
}
