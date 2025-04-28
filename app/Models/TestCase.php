<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestCase extends Model
{
    use HasFactory;

    protected $primaryKey = 'test_case_id';

    protected $fillable = [
        'nomor',
        'kategori',
        'type',
        'nama_test_case',
        'steps',
        'test_data',
        'expected_result'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'kategori');
    }

    public function jenis()
    {
        return $this->belongsTo(Type::class, 'type');
    }
}