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
        Schema::create('posts', function (Blueprint $table) {
            $table->id("post_ID");
            $table->foreign('user_ID')->references('user_ID')->on('users');
            $table->foreign('category_ID')->references('category_ID')->on('categories');
            $table->string("title");
            $table->string("content");
            $table->date("date_posted");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
