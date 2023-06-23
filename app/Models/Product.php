<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_product',
        'name',
        'kategori_id',
        'stok',
        'unit',
        'supplier_id',
        'lokasi',
        'ket',
        'cover'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'kategori_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

}
