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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nomcomplet')->nullable();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->text('photo')->nullable();
            $table->string('telephone')->nullable();
            $table->string('siege')->nullable();
            $table->string('preferences')->nullable();
            $table->string('activites')->nullable();
            $table->enum('role', ['admin', 'promoteur', 'abonne'])->default("abonne");
            $table->enum('status', ['attente', 'accepter', 'rejeter'])->nullable();
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
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
