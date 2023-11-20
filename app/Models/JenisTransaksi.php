<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;


class JenisTransaksi extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];

    public function transaksi(): HasOne
    {
        return $this->hasOne(Transaksi::class);
    }

}
