<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('room_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('name_establishment', 150)->nullable();
            $table->string('class', 150)->default('Class');
            $table->string('cin')->nullable();
            $table->string('tel')->nullable();
            $table->string('avatar')->default('default.jpg');
            $table->timestamp('verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
