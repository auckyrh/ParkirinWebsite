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
            $table->foreignId('id_pemilik')->constrained('users')->onDelete('cascade');
            $table->string("nama");
            $table->string("alamat");
            $table->string("foto_path");
            $table->integer("kapasitasmax_mobil");
            $table->integer("kapasitasmax_motor");
            $table->double("longitude");
            $table->double("latitude");
            $table->integer("biaya_mobil");
            $table->integer("biaya_motor");
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
