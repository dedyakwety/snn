<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained();
            $table->foreignId('adresse_id')->nullable()->constrained();
            $table->foreignId('numero_id')->nullable()->constrained();
            $table->string('name');
            $table->string('postnom')->nullable();
            $table->string('prenom');
            $table->string('sexe');
            $table->string('etat_civil')->nullable();
            $table->string('contact_whatsapp');
            $table->string('contact')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('valide')->default(1);
            $table->string('password');
            $table->string('code_reset')->nullable();
            $table->string('liens_reset_password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
