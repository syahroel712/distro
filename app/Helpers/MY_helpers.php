<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class MY_helpers
{
    public static function nilaiAsliRupiah($rp)
    {
        $rp = str_replace("Rp", "", $rp);
        $rp = str_replace(".", "", $rp);
        $rp = str_replace(",00", "", $rp);
        return $rp;
    }
}
