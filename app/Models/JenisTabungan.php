<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;


class JenisTabungan extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];
    // protected $table = ['jenis_tabungans'];

    public function rekening(): HasOne
    {
        return $this->hasOne(Rekening::class);
    }

}
