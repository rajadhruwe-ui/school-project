<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->ipAddress('ip')->unique();
            $table->timestamps();
        });
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->string('session_id');
            $table->string('ip_address');
            $table->string('user_agent')->nullable();
            $table->string('path')->nullable();
            $table->string('referer')->nullable();
            $table->timestamps();
            $table->index('session_id'); // Add index for better performance
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
        Schema::dropIfExists('visits');
    }
};
