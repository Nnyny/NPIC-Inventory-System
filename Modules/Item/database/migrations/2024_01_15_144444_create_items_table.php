<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string("item_code", 255)->nullable();
            $table->string("item_img", 255)->nullable();
            $table->string("item_name", 255)->nullable();
            $table->biginteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string("item_qty", 255)->nullable();
            $table->string("item_des", 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
