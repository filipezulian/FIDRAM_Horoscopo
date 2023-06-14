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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('cpf')->unique()->nullable();
            $table->unsignedBigInteger('id_signo')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('nascimento')->nullable();;
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('id_signo')->references('id')->on('signo');
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
