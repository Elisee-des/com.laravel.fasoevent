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
        Schema::create('promoteurs', function (Blueprint $table) {
            $table->id();
            $table->string('nomcomplet');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->text('photo')->nullable();
            $table->string('telephone');
            $table->string('siege');
            $table->string('activites');
            $table->enum('role', ['ADMIN', 'PROMOTEUR', 'ABONNE'])->default('ABONNE');
            $table->enum('status', ['attente', 'accepter', 'rejeter'])->default('attente');
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
        Schema::dropIfExists('promoteurs');
    }
};
