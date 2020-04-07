<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warna extends Model
{
    //
    protected $table = "warna";

    protected $primaryKey = "warna_id";

    //mendeklarasikan field mana saja ynag boleh diisi($fillable) / $guarded(yang tidak boleh diisi)
    protected $fillable = ['warna_nama', 'warna_harga'];
}
