<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nama_Supplier',
        'Alamat',
        'Telepon',
        'Email',
    ];

    public function Buah(){
        return $this->hasMany(Buah::class);
    }
}
