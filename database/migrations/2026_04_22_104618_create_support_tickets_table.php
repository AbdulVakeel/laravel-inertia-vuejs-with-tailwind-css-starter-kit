<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('support_tickets', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);
            $table->string('name', 40)->nullable();
            $table->string('email', 40)->nullable();
            $table->string('ticket', 40)->nullable();
            $table->string('subject')->nullable();
            $table->tinyInteger('status')->default(0)
                  ->comment('0: Open, 1: Answered, 2: Replied, 3: Closed');
            $table->tinyInteger('priority')->default(0)
                  ->comment('1 = Low, 2 = Medium, 3 = High');
            $table->dateTime('last_reply')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('support_tickets');
    }
};