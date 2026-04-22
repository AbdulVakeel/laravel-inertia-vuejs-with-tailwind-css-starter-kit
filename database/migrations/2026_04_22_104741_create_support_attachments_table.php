<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('support_attachments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('support_message_id');
            $table->string('attachment')->nullable();
            $table->timestamps();

            // Foreign key (important)
            $table->foreign('support_message_id')
                  ->references('id')
                  ->on('support_messages')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('support_attachments');
    }
};