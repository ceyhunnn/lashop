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
            $table->timestamps();
            $table->string('product_title');
            $table->string('product_slug');
            $table->string('product_sale')->nullable();
            $table->string('product_file')->nullable();
            $table->string('product_content')->nullable();
            $table->string('product_cost')->nullable();
            $table->integer('product_must')->default(0);
            $table->enum('product_category',['Men','Women','Sports','Electronics'])->nullable();
            $table->enum('product_status',['0','1'])->default(1);
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
