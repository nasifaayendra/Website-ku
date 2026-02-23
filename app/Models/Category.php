<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    //1. Memberikan nama tabel
    protected $table = 'categories';

    //2. Inisialisasi colum
    protected $fillable = [
        'category',
        'slug',
    ];

    // relasi category ke product
    // jadi 1 category mempunyai banyak product
    // kalau HasMany tambahkan s pada functionnya
    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }

}
