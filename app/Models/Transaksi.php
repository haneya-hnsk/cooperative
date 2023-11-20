<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Transaksi extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];


    public function rekening():BelongsTo
    {
        return $this->belongsTo(Rekening::class, 'no_rek', 'no_rek');
    }

    public function jenis_transaksi(): BelongsTo
    {
        return $this->belongsTo(JenisTransaksi::class,'id_jenis_transaksi' );
    }

    // public function do($transaksi){
    //     if($transaksi->jenis_transaksi()->menambah_saldo == 0){

    //     };
    // }
}
