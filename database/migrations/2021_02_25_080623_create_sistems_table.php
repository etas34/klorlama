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
            $table->string('klorlama_tel')->nullable();
            $table->string('motor_tel')->nullable();
            $table->string('klor_olcum_tel')->nullable();
            $table->string('klor')->nullable();
            $table->string('pompa')->nullable();
            $table->string('elektrik')->nullable();
            $table->string('alt_limit')->nullable();
            $table->string('ust_limit')->nullable();

            $table->string('depo_seviye')->nullable();
            $table->string('debi')->nullable();

            $table->string('klor_atim_sure')->nullable();
            $table->string('klor_durum')->nullable();
            $table->string('klor_ariza_durum')->nullable();
            $table->string('klor_dolum')->nullable();
            $table->string('klor_bitis')->nullable();
            $table->string('klor_sonucu')->nullable();
            $table->string('son_olcum_zaman')->nullable();


            $table->string('period_saat')->nullable();
            $table->string('period_saniye')->nullable();


            $table->tinyInteger('durum')->default(1);
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
