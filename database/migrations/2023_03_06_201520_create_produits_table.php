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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->text("libelle");
            $table->string("photoProduit")->nullable();
            $table->text("description")->nullable();
            $table->integer("quantite")->default(0);
            $table->integer("quantiteMin");
            $table->integer("prix");
            $table->foreignId("type_produit_id");
            $table->foreign("type_produit_id")
                ->references("id")
                ->on("type_produits")
                ->onDelete("cascade");
                $table->foreignId("fournisseur_id");
            $table->foreign("fournisseur_id")
                ->references("id")
                ->on("fournisseurs")
                ->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
