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
        Schema::create('prestation_soin', function (Blueprint $table) {
            $table->id();
            $table->foreignId("soin_id");
            $table->foreign("soin_id")
                ->references("id")
                ->on("soins")
                ->onDelete("restrict");
            $table->foreignId("prestation_id");
            $table->foreign("prestation_id")
                ->references("id")
                ->on("prestations")
                ->onDelete("restrict");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestation_soin');
    }
};
