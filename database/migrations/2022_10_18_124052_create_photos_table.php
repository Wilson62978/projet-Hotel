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
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chambre_id');
            $table->foreign('chambre_id')
                ->references('id')
                ->on('chambres')
                ->cascadeOnDelete()
                ->restrictOnUpdate();
            $table->unsignedBigInteger('upload_id');
            $table->foreign('upload_id')
                ->references('id')
                ->on('uploads')
                ->cascadeOnDelete()
                ->restrictOnUpdate();
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
        Schema::dropIfExists('photos');
    }
};
