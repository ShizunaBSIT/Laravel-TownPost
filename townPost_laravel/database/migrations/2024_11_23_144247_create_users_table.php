<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->id('user_ID');
            $table->string('username')->unique(); // Ensure this line exists
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('moderator_ID');
            $table->timestamp('date_created')->useCurrent(); // Optional, adjust as needed
            $table->rememberToken();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
