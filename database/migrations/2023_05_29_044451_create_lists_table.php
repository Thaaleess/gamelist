<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lists', function (Blueprint $table) {
            $table->id();
            $table->string('name', 128);
            $table->foreignId('users_id')->constrained();
        });

        DB::table('lists')->insert([
            'name' => 'Jogos completados',
            'users_id' => '2',
        ]);

        DB::table('lists')->insert([
            'name' => 'Jogos em andamento',
            'users_id' => '2',
        ]);

        DB::table('lists')->insert([
            'name' => 'Jogos que quero jogar',
            'users_id' => '2',
        ]);
        
        DB::table('lists')->insert([
            'name' => 'Jogos favoritos',
            'users_id' => '2',
        ]);  
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lists');
    }
};
