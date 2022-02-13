<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributeValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_values', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('attribute_id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamps();
            $table->foreign('attribute_id')->references('id')->on('attributes')->cascadeOnDelete();




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attribute_values');
    }
}
