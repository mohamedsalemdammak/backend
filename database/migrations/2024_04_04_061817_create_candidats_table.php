<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('candidats', function (Blueprint $table) {
            $table->id();
            $table->string('login')->unique();
            $table->string('password');
            $table->text('description')->nullable();
            $table->date('date_naissance')->nullable();
            $table->string('adresse')->nullable();
            $table->string('email')->unique();
            $table->string('telephone')->nullable();
            $table->string('nom_prenom');
            $table->string('cv')->nullable();


            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('candidats');
    }
};
