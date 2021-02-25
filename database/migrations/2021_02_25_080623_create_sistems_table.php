<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSistemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sistems', function (Blueprint $table) {
            $table->id();
            $table->string('ad');
            $table->unsignedInteger('il_id');
            $table->unsignedInteger('ilce_id');
            $table->string('telefon');
            $table->string('klor')->nullable();
            $table->string('pompa')->nullable();
            $table->string('elektrik')->nullable();
            $table->string('gunes_paneli')->nullable();
            $table->string('depo_guvenlik')->nullable();
            $table->string('pano_guvenlik')->nullable();
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
        Schema::dropIfExists('sistems');
    }
}
