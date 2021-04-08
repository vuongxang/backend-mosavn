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
            $table->string('name')->uniqid();
            $table->string('image')->default('https://tranzi.vn/images/tranzi/default_product.jpg');
            $table->text('content')->nullable();
            $table->text('short_desc')->nullable();
            $table->integer('price');
            $table->integer('sale_price')->nullable();
            $table->unsignedBigInteger('cate_id');
            $table->timestamps();
            $table->foreign('cate_id')
                    ->references('id')->on('categories');
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
