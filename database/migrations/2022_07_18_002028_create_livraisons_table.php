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
        Schema::create('livraisons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('livreur_id')->nullable();
            $table->integer('achat_numero')->nullable();
            $table->date('date_livraison');
            $table->string('heure_livraison');
            $table->mediumText('adresse_livraison');
            $table->integer('nombre_article')->nullable();
            $table->double('prix_achat');
            $table->double('prix_total');
            $table->double('remise_pourcentage')->nullable();
            $table->double('remise')->nullable();
            $table->boolean('beneficier')->default(0);
            $table->double('montant_remise')->nullable();
            $table->boolean('livree')->default(0);
            $table->boolean('valide')->default(1);
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
        Schema::dropIfExists('livraisons');
    }
};
