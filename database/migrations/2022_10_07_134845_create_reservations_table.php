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
                ->restrictOnUpdate();
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
