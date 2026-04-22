<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('support_messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('support_ticket_id')->default(0);
            $table->unsignedBigInteger('admin_id')->default(0);
            $table->longText('message')->nullable();
            $table->timestamps();

            // Optional (recommended relationships)
            $table->foreign('support_ticket_id')
                  ->references('id')
                  ->on('support_tickets')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('support_messages');
    }
};