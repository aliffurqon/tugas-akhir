<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id');
            $table->unsignedBigInteger('rekening_id');
            $table->unsignedBigInteger('jurusan_id');
            $table->string('total');
            $table->string('status_pembayaran');
            $table->timestamps();
            $table->foreign('siswa_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('rekening_id')->references('id')->on('rekenings')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('jurusan_id')->references('id')->on('jurusans')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
