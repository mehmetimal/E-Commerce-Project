<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('basket_id')->unsigned();
            $table->decimal('price',9,2);
            $table->String ('phone')->nullable();
            $table->String ('name')->nullable();
            $table->String ('surname')->nullable();
            $table->String ('province')->nullable();
            $table->string('district')->nullable();
            $table->string('description')->nullable();
            $table->Integer('order_type');
            $table->string('state')->nullable();
            $table->string('bank')->nullable();
            $table->Integer('installment')->nullable();
            $table->timestamps();
            $table->unique('basket_id');
            $table->foreign('basket_id')
                ->references('id')
                ->on('baskets')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
