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
        if (Schema::hasColumn('chambres', 'thumbnail_img')){  
            Schema::table('chambres', function (Blueprint $table) {
                $table->dropColumn( 'thumbnail_img');
   
            });
        }

        Schema::table('chambres', function (Blueprint $table) {
            $table->unsignedBigInteger('thumbnail_img')->nullable();
            $table->foreign('thumbnail_img')
                ->references('id')
                ->on('uploads')
                ->nullOnDelete()
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
        Schema::table('chambres', function (Blueprint $table) {
            //
        });
    }
};
