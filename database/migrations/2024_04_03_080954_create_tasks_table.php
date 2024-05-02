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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("category_id");

            $table->String("title")->nullable();
            $table->String("content");
            $table->tinyInteger("status")->default(0)->comment("0-yapılmadı 1-yapılıyor 2-ertelendi 3-yapıldı");
            $table->dateTime("deadline")->nullable();
            $table->softDeletes();

            $table->timestamps();

            $table->foreign('category_id')->on('categories')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
