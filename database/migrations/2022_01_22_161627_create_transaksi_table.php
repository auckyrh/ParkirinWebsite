<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plat_nomor');
            $table->foreign('plat_nomor')->references('plat_nomor')->on('kendaraan')->onDelete('cascade');
            $table->foreignId('id_user')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_lokasi')->constrained('lokasi')->onUpdate('cascade')->onDelete('cascade');
            $table->string('jenis_kendaraan');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->integer('durasi');
            $table->integer('biaya');
            $table->string('status_pembayaran');
            $table->dateTime('waktu_pembayaran')->nullable();
            $table->string('status_transaksi');
            $table->string('checkin_oleh')->nullable();
            $table->dateTime('checkin_pada')->nullable();
            $table->string('checkout_oleh')->nullable();
            $table->dateTime('checkout_pada')->nullable();
            $table->string('catatan')->nullable();
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
        Schema::dropIfExists('transaksi');
    }
}
