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
        'kategori_id',
        'type_id',
        'nama_test_case',
        'steps',
        'test_data',
        'expected_result',
        'case_type',
        'admin_status',
        'priority',
        'position',
        'is_used',
        'tags', // tambahkan ini
    ];

    protected $casts = [
        'tags' => 'array', // penting biar Laravel tau ini JSON
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'kategori_id');
    }

    public function jenis()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function getTagsDetailAttribute()
    {
        return Tag::whereIn('id', $this->tags ?? [])->get();
    }
}