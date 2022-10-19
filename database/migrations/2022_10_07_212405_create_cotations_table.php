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
        Schema::create('cotations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("nom");
            $table->string("prenom");
            $table->string("email");
            $table->string("telephone");
            $table->dateTime('dateDebut');
            $table->unsignedInteger("nombreParticipant");
            $table->boolean('hebergement');
            $table->text("commentaire")->nullable();
            $table->boolean("status")->nullable();
            $table->unsignedBigInteger('evenement_id');
            $table->foreign('evenement_id')
                ->references('id')
                ->on('evenements')
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
        Schema::dropIfExists('cotations');
    }
};
