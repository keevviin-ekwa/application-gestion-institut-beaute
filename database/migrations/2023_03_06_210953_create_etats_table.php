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
        Schema::create('etats', function (Blueprint $table) {
            $table->id();
            $table->date("date_debut")->nullable();
            $table->date("date_fin")->nullable();
            $table->text("description")->nullable();
            $table->boolean("disponibilite")->default(true);
            $table->foreignId("type_etat_id");
            $table->foreign("type_etat_id")
                    ->references("id")
                    ->on("type_etats")
                    ->onDelete("restrict");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etats');
    }
};
