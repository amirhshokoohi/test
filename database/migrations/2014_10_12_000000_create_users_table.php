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
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->integer('multi-user')->default(1);
            $table->integer('is_online')->default(0);
            $table->string('end_date')->nullable();
            $table->string('date_of_first_connection')->nullable();
            $table->integer('status')->default(1);
            $table->integer('traffic')->default(0);
            $table->string('representative')->nullable();
            $table->longText('description')->nullable();
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
