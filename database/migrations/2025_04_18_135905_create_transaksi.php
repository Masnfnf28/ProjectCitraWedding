<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('id_album');
            $table->string('id_makeup');
            $table->string('id_catering');
            $table->string('kode_invoice');
            $table->integer('id_client');
            $table->date('tanggal');
            $table->enum('dibayar',['Lunas','Belum Lunas']);
            $table->string('id_user');
            $table->integer('total_bayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
