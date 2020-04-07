<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    //
    protected $table = "bahan";

    protected $primaryKey = "bahan_id";

    //mendeklarasikan field mana saja ynag boleh diisi($fillable) / $guarded(yang tidak boleh diisi)
    protected $fillable = ['bahan_nama', 'bahan_harga'];
}
