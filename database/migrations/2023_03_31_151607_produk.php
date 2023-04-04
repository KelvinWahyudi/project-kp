<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Produk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->char("idProduk")->nullable();
            $table->string("nama")->nullable();
            $table->text("detailProduk")->nullable();
            $table->string("foto")->nullable();
            $table->integer("harga")->nullable();
            $table->integer("stok")->nullable();
            $table->primary("idProduk");
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
        Schema::dropIfExists('produk');
    }
}
