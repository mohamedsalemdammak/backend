<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up(): void
    {
        Schema::create('list-participants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idoffre');
            $table->unsignedBigInteger('idcandidat');
            $table->boolean('etat');
          
         
            $table->foreign('idoffre')->references('id')->on('offres');
            $table->foreign('idcandidat')->references('id')->on('candidats');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('list-participants');
    }
};
