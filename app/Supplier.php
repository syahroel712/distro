<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    protected $table = "supplier";

    protected $primaryKey = "supplier_id";

    //mendeklarasikan field mana saja ynag boleh diisi($fillable) / $guarded(yang tidak boleh diisi)
    protected $fillable = ['supplier_nama', 'supplier_kontak', 'supplier_email', 'supplier_alamat'];
}
