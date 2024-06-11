<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nama_Pelanggan',
        'Alamat',
        'Telepon',
        'Email',
        'ID_Buah',
        'Jumlah',
        'Total',
        'Status_Pesanan',
    ];

    public function buah()
    {
        return $this->belongsToMany(Buah::class);
    }
}
