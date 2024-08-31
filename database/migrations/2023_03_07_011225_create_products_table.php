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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->nullable()->constrained()->cascadeOnupdate()->nullOnDelete();
            $table->foreignId('sous__categorie_id')->constrained();

            $table->string('titre_prod');
            $table->string('description');
            $table->integer('prix_prod');
            $table->string('ville');
            $table->integer('type_offre');
           
            $table->integer('etat');
            $table->integer('deletable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
}
?>
