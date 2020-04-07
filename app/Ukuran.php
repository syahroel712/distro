<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ukuran extends Model
{
    //
    protected $table = "ukuran";

    protected $primaryKey = "ukuran_id";

    //mendeklarasikan field mana saja ynag boleh diisi($fillable) / $guarded(yang tidak boleh diisi)
    protected $fillable = ['ukuran_nama', 'ukuran_harga'];
}
