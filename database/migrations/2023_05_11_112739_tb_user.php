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
        Schema::create('tb_user', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('image')->nullable();
            $table->text('tag')->nullable();
            $table->text('desc')->nullable();
            $table->text('phone')->nullable();
            $table->text('address')->nullable();
            $table->text('password');
            $table->text('email')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_user');
    }
};
