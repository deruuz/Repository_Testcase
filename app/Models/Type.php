<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $table = 'type';

    protected $fillable = [
        'name',
        'description',
    ];

    // Relasi ke TestCase
    public function testCases()
    {
        return $this->hasMany(TestCase::class, 'type'); // Relasi ke banyak TestCase
    }
}
