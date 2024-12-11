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
        Schema::create('comments', function (Blueprint $table) {
            $table->id('comment_ID');
            $table->unsignedBigInteger('post_ID');
            $table->foreign('post_ID')->references('post_ID')->on('posts');
            $table->unsignedBigInteger('user_ID');
            $table->foreign('user_ID')->references('user_ID')->on('users');
            $table->string('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
