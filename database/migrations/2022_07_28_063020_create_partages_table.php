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
        Schema::create('partages', function (Blueprint $table) {
            $table->id();
            $table->date('date_vente');
            $table->double('achat');
            $table->double('vente');
            $table->double('gain_brut');
            $table->double('remise_pourcentage');
            $table->double('remise_in');
            $table->double('remise_out')->nullable();
            $table->double('transport');
            $table->double('gain');
            $table->double('depense');
            $table->double('agent');
            $table->double('admin');
            $table->double('entreprise');
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
        Schema::dropIfExists('partages');
    }
};
