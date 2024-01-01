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
        Schema::create('tournament_chitiet', function (Blueprint $table) {
            $table->bigInteger("id")->primary();
            $table->string("teamName");
            $table->bigInteger("teamId");
            $table->bigInteger("tournamentId");
            $table->string("status");
            $table->dateTime("createdAt");
            $table->dateTime("updatedAt");
            $table->bigInteger("createdBy");
            $table->bigInteger("updatedBy");
        });
        Schema::table('tournament_chitiet', function (Blueprint $table) {
            $table->foreign('teamId')->references('id')->on('team');
            $table->foreign('tournamentId')->references('id')->on('tournament');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tournament_chitiet');
    }
};
