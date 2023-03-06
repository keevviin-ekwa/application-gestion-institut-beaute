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
        Schema::create('prestations', function (Blueprint $table) {
            $table->id();
            $table->dateTime("date_prestation");
            $table->text("description")->nullable();
            $table->foreignId("client_id");
            $table->foreignId("estheticien_id");
            $table->foreignId("reservation_id");
            $table->foreign("client_id")->references("id")->on("users");
            $table->foreign("estheticien_id")->references("id")->on("users");
            $table->foreign("reservation_id")
                ->references("id")
                ->on("reservations")
                ->onDelete("restrict");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestations');
    }
};
