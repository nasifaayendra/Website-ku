<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    //1. Memberikan nama tabel
    protected $fillable = [
    'user_id',
    'category_id',
    'supplier_id',
    'product_name',
    'slug',
    'merk',
    'description',
    'image',
    ];
    // 1. relasi product ke category
    // jadi banyak product hanya punya 1 category
    // kalau belongsTo tidak tambahkan s/es pada function
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    // 2. relasi product ke supplier
    // jadi banyak product hanya punya 1 category
    // kalau belongsTo tidak tambahkan s/es pada function
    public function supplier(): BelongsTo
    {
        return $this->belongsTo(supplier::class);
    }
}
