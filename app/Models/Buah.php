<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Buah extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nama_Buah',
        'Harga_kg',
        'Stok_Buah',
        'ID_Supplier',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function pesanan()
    {
        return $this->belongsToMany(Pesanan::class);
    }
}
