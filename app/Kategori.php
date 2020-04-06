<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    //
    protected $table = "kategori";

    protected $primaryKey = "kategori_id";

    //mendeklarasikan field mana saja ynag boleh diisi($fillable) / $guarded(yang tidak boleh diisi)
    protected $fillable = ['kategori_nama'];
}
