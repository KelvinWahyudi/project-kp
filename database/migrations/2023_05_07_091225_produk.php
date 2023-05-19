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
        $table->id();
        $table->char("product_id")->unique();
        $table->string("nama")->nullable();
        $table->text("product_detail")->nullable();
        $table->string("foto")->nullable();
        $table->integer("harga")->nullable();
        $table->integer("stok")->nullable();
        $table->unsignedBigInteger('category_id')->nullable();
        $table->foreign('category_id')
          ->references('id')
          ->on('category')
          ->onUpdate('cascade')
          ->onDelete('cascade');
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
        //
    }
}