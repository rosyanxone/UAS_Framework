<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('total_harga');
            $table->string('jumlah_barang');
            $table->string('alamat');
            $table->foreignId('penjual_id');
            $table->foreignId('pembeli_id');
            $table->foreignId('produk_id');
            $table->timestamps();
            $table->foreign('penjual_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pembeli_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('produk_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
