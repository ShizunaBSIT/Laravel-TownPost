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
        Schema::create('mod_permissions', function (Blueprint $table) {
            $table->id('permission_ID');
            $table->unsignedBigInteger('moderator_ID');
            $table->string('permission_name');
            $table->timestamps();

            //$table->foreign('moderator_ID')->references('moderator_ID')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mod_permissions');
    }
};
