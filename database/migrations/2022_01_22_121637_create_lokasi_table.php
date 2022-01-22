<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLokasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lokasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pemilik')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama');
            $table->string('alamat');
            $table->string('foto_path');
            $table->integer('kapasitasmax_mobil')->default(0);
            $table->integer('kapasitasmax_motor')->default(0);
            $table->double('longitude');
            $table->double('latitude');
            $table->integer('biaya_mobil')->default(0);
            $table->integer('biaya_motor')->default(0);
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
        Schema::dropIfExists('lokasi');
    }
}
