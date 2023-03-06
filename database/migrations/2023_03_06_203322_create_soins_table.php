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
        Schema::create('soins', function (Blueprint $table) {
            $table->id();
            $table->string("libelle");
            $table->text("description")->nullable();
            $table->integer("duree");
            $table->double("cout")->nullable();
            $table->foreignId("type_soin_id");
            $table->foreign("type_soin_id")
                  ->references("id")
                  ->on("soins")
                  ->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soins');
    }
};
