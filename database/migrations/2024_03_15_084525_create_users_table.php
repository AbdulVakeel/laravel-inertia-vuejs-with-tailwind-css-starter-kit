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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name', 40)->nullable();
            $table->string('last_name', 40)->nullable();
            $table->string('username', 40);
            $table->string('email', 40);
            $table->string('country', 40)->nullable();
            $table->string('mobile', 40)->nullable();
            $table->string('password', 255);
            $table->boolean('status')->default(true)->comment('0: banned, 1: active');
            $table->boolean('ev')->default(false)->comment('0: email unverified, 1: email verified');
            $table->string('ver_code', 40)->nullable()->comment('stores verification code');
            $table->dateTime('ver_code_send_at')->nullable()->comment('verification send time');
            $table->string('banned_reason', 255)->nullable();
            $table->string('remember_token', 255)->nullable();
            $table->timestamps();

            $table->unique(['username', 'email'], 'username');
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
};
