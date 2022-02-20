<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('shop_id');

            $table->unsignedBigInteger('category_id');

            $table->string('barcode')->unique();

            $table->double('price',10,2);

            $table->integer('quantity');

            $table->string('name');

            $table->string('slug');

            $table->boolean('is_published')->default(1);

            $table->timestamps();

            $table->foreign('shop_id')->references('id')->on('shops');

            $table->foreign('category_id')->references('id')->on('categories');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
