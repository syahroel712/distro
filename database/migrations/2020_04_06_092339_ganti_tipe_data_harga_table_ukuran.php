<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class GantiTipeDataHargaTableUkuran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE ukuran CHANGE ukuran_harga ukuran_harga int(11)");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //DB::statement("ALTER TABLE ukuran CHANGE ukuran_harga ukuran_harga int(11)");
        // Schema::table('ukuran', function (Blueprint $table) {
        //     //
        // });
    }
}
