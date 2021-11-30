<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('invoice')->nullable();
            $table->dateTime('tgl_sewa')->nullable();
            $table->dateTime('tgl_kembali')->nullable();
            $table->integer('total_bayar')->unsigned()->nullable();
            $table->enum('status',['Lunas', 'Belum lunas', 'Belum Bayar'])->default('Belum Bayar');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_transaksi');
    }
}
