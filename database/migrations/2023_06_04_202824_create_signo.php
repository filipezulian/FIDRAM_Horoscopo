<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('signo', function (Blueprint $table) {
            $table->id('id_signo');
            $table->string('nome');
            $table->timestamps();
        });
        
        DB::table('signo')->insert([
            ['nome' => 'Aries'],
            ['nome' => 'Taurus'],
            ['nome' => 'Gemini'],
            ['nome' => 'Cancer'],
            ['nome' => 'Leo'],
            ['nome' => 'Virgo'],
            ['nome' => 'Libra'],
            ['nome' => 'Scorpio'],
            ['nome' => 'Sagittarius'],
            ['nome' => 'Capricorn'],
            ['nome' => 'Aquarius'],
            ['nome' => 'Pisces'],
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('signo');
    }
};
