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
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('inventory_id')->constrained('inventories')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->text('desc');
            $table->string('image');
            $table->bigInteger('price');
            $table->string('color');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**cl
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
