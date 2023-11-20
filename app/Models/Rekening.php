<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Rekening extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];
    // protected $primaryKey = ['no_rek'];

    public function nasabah(): BelongsTo
    {
        return $this->belongsTo(Nasabah::class, 'id_nasabah');
    }

    public function jenis_tabungan(): BelongsTo
    {
        return $this->belongsTo(JenisTabungan::class, 'id_jenis_tabungan');
    }

    public function transaksi(): HasMany
    {
        return $this->hasMany(Transaksi::class);
    }
}
