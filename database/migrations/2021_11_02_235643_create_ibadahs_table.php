<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIbadahsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ibadahs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_ibadah');
            $table->string('tanggal');
            $table->string('deskripsi');
            $table->string('jam_ibadah');
            $table->string('background_image');
            $table->integer('quota');
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
        Schema::drop('ibadahs');
    }
}
