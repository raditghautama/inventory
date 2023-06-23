<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_sell',
        'karyawan_id',
        'product_id',
        'qty'
    ];

    public function users(){
        return $this->belongsTo(User::class, 'karyawan_id', 'id');
    }

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
