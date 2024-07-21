<?php

use App\Models\Classe;
use App\Models\Etablissement;
use App\Models\Role;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique()->nullable();
            $table->string('matricule')->unique()->nullable();
            $table->string('email')->unique();
            $table->foreignIdFor(Classe::class)->nullable();
            $table->foreignIdFor(Role::class);
            $table->foreignIdFor(Etablissement::class)->onDelete('cascade')->nullable();
            $table->text('selected_classes')->nullable();
            $table->text('matiere_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('image')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
