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
            $table->id();
            $table->string('nome');
            $table->timestamps();
        });
        
        DB::table('signo')->insert([
            ['nome' => 'Áries'],
            ['nome' => 'Touros'],
            ['nome' => 'Gêmeos'],
            ['nome' => 'Câncer'],
            ['nome' => 'Leão'],
            ['nome' => 'Virgem'],
            ['nome' => 'Libra'],
            ['nome' => 'Escorpião'],
            ['nome' => 'Sagitário'],
            ['nome' => 'Capricórnio'],
            ['nome' => 'Aquário'],
            ['nome' => 'Peixes'],
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
