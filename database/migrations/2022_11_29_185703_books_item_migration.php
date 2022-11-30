<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books_item', function (Blueprint $table) {
            $table->id();      
            $table->unsignedBigInteger('books_id');
            $table->unsignedBigInteger('user_order_id');
            $table->foreign('books_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('user_order_id')->references('id')->on('user_order')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books_item');
    }
};
