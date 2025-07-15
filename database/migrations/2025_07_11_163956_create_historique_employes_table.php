<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('historique_employes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employe_id');
            $table->unsignedBigInteger('emploi_id');
            $table->date('date_debut')->nullable();
            $table->date('date_fin')->nullable();
            $table->timestamps();

            // Clés étrangères
            $table->foreign('employe_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('emploi_id')->references('id')->on('emplois')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('historique_employes');
    }
};
