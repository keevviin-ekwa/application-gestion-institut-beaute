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
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->string("numero_facture");
            $table->date("date_facturation");
            $table->double("montant_ht");
            $table->double("montant_ttc");
            $table->double("tva");
            $table->double("reduction");
            $table->foreignId("prestation_id");
            $table->foreignId("paiement_id");
            $table->foreign("prestation_id")
                    ->references("id")
                    ->on("prestations")
                    ->onDelete("cascade");
            $table->foreign("paiement_id")
                    ->references("id")
                    ->on("paiements");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};
