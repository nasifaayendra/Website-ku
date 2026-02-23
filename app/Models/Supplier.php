<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
    //1. Memberi nama tabel
    protected $table = 'suppliers';

    //2. Insisialisasi column
    protected $fillable = [
        'nama_supplier',
        'city',
        'region',
        'address',
    ];

    // relasi supplier ke product
    // jadi 1 supplier mempunyai banyak product
    // kalau HasMany tambahkan s pada functionnya 
   
        public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
