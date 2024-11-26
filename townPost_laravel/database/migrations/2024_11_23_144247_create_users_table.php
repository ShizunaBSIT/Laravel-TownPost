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
        Schema::create('users', function (Blueprint $table) {
            $table->temporary(); // comment this when done testing and developing
            /*
            This is so that the database doesnt get bloated with testing data
            From Laravel docs:
            Temporary tables are only visible to the current connection's database session 
            and are dropped automatically when the connection is closed
            */

            $table->id('user_ID');
            $table->string('username');
            $table->string('password');
            $table->string('date_created');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
