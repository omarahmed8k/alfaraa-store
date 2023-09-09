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
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('dese_ar')->nullable();
            $table->string('dese_en')->nullable();
            $table->string('nickname_st')->nullable();
            $table->string('nickname_num')->nullable();
            $table->string('nickname_main')->nullable();
            $table->string('num1')->nullable();
            $table->string('val1')->nullable();
            $table->string('num2')->nullable();
            $table->string('val2')->nullable();
            $table->string('num3')->nullable();
            $table->string('val3')->nullable();
            $table->string('num4')->nullable();
            $table->string('val4')->nullable();
            $table->string('num5')->nullable();
            $table->string('val5')->nullable();
            $table->string('num6')->nullable();
            $table->string('val6')->nullable();
            $table->string('num7')->nullable();
            $table->string('val7')->nullable();
            $table->string('price')->nullable();
            $table->string('image')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->integer('category_id')->nullable();
            // $table->foreign('category_id')->references('id')->on('categories');
            // $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('products');
    }
}
