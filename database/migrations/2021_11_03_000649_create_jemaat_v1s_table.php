<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJemaatV1sTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jemaat_v1s', function (Blueprint $table) {
            $table->string('nik');
            $table->string('nama_lengkap');
            $table->string('nomor_whatsapp');
            $table->string('alamat_domisili');
            $table->date('tanggal_lahir');
            $table->string('kartu_vaksin');
            $table->increments('id');
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
        Schema::drop('jemaat_v1s');
    }
}
