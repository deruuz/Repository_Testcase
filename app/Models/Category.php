<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $fillable = [
        'name',
        'description',
    ];

    // Relasi ke TestCase
    public function testCases()
    {
        return $this->hasMany(TestCase::class, 'kategori_id'); // Relasi ke banyak TestCase
    }
}
