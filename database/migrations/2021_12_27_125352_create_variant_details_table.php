<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariantDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variant_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('variant_id');
            $table->boolean('isItDiscounted')->default(0);
            $table->boolean('isSpecial')->default(0);
            $table->double('discount_percentage')->nullable();
            $table->double('price_after_discount')->nullable();
            $table->timestamps();
            $table->foreign('variant_id')->references('id')->on('variants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('variant_details');
    }
}
