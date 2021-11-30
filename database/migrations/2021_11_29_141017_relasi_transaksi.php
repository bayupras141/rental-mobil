<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelasiTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // create relationship on table transaksi
        Schema::table('tb_transaksi', function (Blueprint $table) {
            $table->unsignedBigInteger('pelanggan_id');
            $table->unsignedBigInteger('mobil_id');
            $table->unsignedBigInteger('paket_id');
            $table->foreign('pelanggan_id')->references('id')->on('tb_pelanggan');
            $table->foreign('mobil_id')->references('id')->on('tb_mobil');
            $table->foreign('paket_id')->references('id')->on('tb_paket');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
