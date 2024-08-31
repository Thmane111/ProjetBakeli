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
        Schema::create('navigue_categories', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->foreignId('icon_id');
            $table->foreignId('navigue_menu_id')->nullable()->constrained()->cascadeOnupdate()->nullOnDelete();
            $table->string('detail');
            $table->integer('etat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('navigue_categories');
    }
};