<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gudang_id');
            $table->bigInteger('kategori_id')->unsigned()->nullable();
            $table->string('nama');
            $table->integer('harga');
            $table->timestamps();
        });

        Schema::table('barang', function ($table) {
            $table->foreign('gudang_id')->references('id')
                ->on('gudang')->onDelete('cascade');
            $table->foreign('kategori_id')->references('id')
                ->on('kategori')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
}
