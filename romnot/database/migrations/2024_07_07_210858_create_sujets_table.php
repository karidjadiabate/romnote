<?php

use App\Models\Classe;
use App\Models\Filiere;
use App\Models\Matiere;
use App\Models\TypeSujet;
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
        Schema::create('sujets', function (Blueprint $table) {
            $table->id();
            $table->string('titre')->nullable();
            $table->mediumText('soustitre')->nullable();
            $table->foreignIdFor(TypeSujet::class);
            $table->foreignIdFor(Filiere::class);
            $table->foreignIdFor(Matiere::class);
            $table->foreignIdFor(Classe::class);
            $table->time('heure');
            $table->string('statut')->default('noncorrige');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sujets');
    }
};
