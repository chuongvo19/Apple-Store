<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('screen_size')->nullable();
            $table->text('rear_camera')->nullable();
            $table->text('front_camera')->nullable();
            $table->text('chipset')->nullable();
            $table->integer('ram')->nullable();
            $table->integer('rom')->nullable();
            $table->integer('battery')->nullable();
            $table->text('screen_resolution')->nullable();
            $table->text('size')->nullable();
            $table->integer('waterproof')->nullable();
            $table->text('infomation')->nullable();
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
        Schema::dropIfExists('specifications');
    }
}
