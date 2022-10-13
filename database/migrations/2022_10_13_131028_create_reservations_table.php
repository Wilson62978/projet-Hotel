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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime("dateDebut");
            $table->dateTime("dateFin");
            $table->unsignedBigInteger("motant");
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete()
                ->restrictOnUpdate()->nullable();
            $table->unsignedBigInteger('chambre_id');
            $table->foreign('chambre_id')
                ->references('id')
                ->on('chambres')
                ->cascadeOnDelete()
                ->restrictOnUpdate();
            $table->unsignedBigInteger('methodePayement_id');
            $table->foreign('methodePayement_id')
                ->references('id')
                ->on('methode_payements')
                ->cascadeOnDelete()
                ->restrictOnUpdate();
            $table->string("nom");
            $table->string("prenom");
            $table->string("email");
            $table->string("numero");
            $table->unsignedBigInteger('nationalite_id');
            $table->foreign('nationalite_id')
            ->references('id')
            ->on('nationalites')
            ->cascadeOnDelete()
            ->restrictOnUpdate();
            $table->string("numeroCarte");
            $table->string("cvvCvc");
            $table->string("nomTitulaire");
            $table->date("dateExpiration");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};
