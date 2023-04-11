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
        Schema::create('soin_produit', function (Blueprint $table) {
            $table->foreignId("soin_id");
            $table->foreign("soin_id")
                    ->references("id")
                    ->on("soins")
                    ->onDelete("restrict");
            $table->foreignId("produit_id");
            $table->foreign("produit_id")
                ->references("id")
                ->on("produits")
                ->onDelete("restrict");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soin_produit');
    }
};
