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
            $table->string('fullname');
            $table->string('image')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('is_active')->default(1);

            $table->unsignedBigInteger('role_id')->nullable();
            $table->foreign('role_id')->references('id')->on('roles');

            $table->unsignedBigInteger('employment_id')->nullable();
            $table->foreign('employment_id')->references('id')->on('employments');

            $table->unsignedBigInteger('title_id')->nullable();
            $table->foreign('title_id')->references('id')->on('titles');

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
