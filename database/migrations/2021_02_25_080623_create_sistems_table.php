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
            $table->unsignedInteger('il_id');
            $table->unsignedInteger('ilce_id');
            $table->string('klor');
            $table->string('pompa');
            $table->string('elektrik');
            $table->string('gunes_paneli');
            $table->string('depo_guvenlik');
            $table->string('pano_guvenlik');
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
