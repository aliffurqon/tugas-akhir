<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mobil_id');
            $table->unsignedBigInteger('karyawan_id');
            $table->unsignedBigInteger('siswa_id')->nullable();
            $table->dateTimeTz('mulai');
            $table->dateTimeTz('selesai');
            $table->string('status');
            $table->timestamps();
            $table->foreign('mobil_id')->references('id')->on('mobils')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('karyawan_id')->references('id')->on('karyawans')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('siswa_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwals');
    }
}
