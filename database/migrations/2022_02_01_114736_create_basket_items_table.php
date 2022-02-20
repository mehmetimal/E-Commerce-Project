<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasketItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basket_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('basket_id')->unsigned();
            $table->string('name');
            $table->Integer('qty');
            $table->string('image_url');
            $table->decimal('price',10,2);
            $table->boolean('is_refunded')->default(0);
            $table->integer('transaction_id')->nullable();
            $table->boolean('is_applied')->default(0);

            $table->foreign('basket_id')->references('id')->on('baskets')->onDelete('cascade');
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
        Schema::dropIfExists('basket_items');
    }
}
