<?php

use App\Models\TypeEtablissement;
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
        Schema::create('etablissements', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('nometablissement');
            $table->string('anneefondation');
            $table->string('adresse');
            $table->string('description');
            $table->string('nomresponsable');
            $table->foreignIdFor(TypeEtablissement::class);
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etablissements');
    }
};
