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
        Schema::create('team_member', function (Blueprint $table) {
            $table->bigInteger("id")->primary();
            $table->string("name");
            $table->string("description")->nullable();
            $table->integer("level")->nullable();
            $table->string("position")->nullable();
            $table->bigInteger("teamId");
            $table->bigInteger("userId");
            $table->dateTime("createdAt");
            $table->dateTime("updatedAt");
            $table->bigInteger("createdBy");
            $table->bigInteger("updatedBy");
        });
        Schema::table('team_member', function (Blueprint $table) {
            $table->foreign("teamId")->references("id")->on("team");
            $table->foreign("userId")->references("id")->on("user");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_member');
    }
};
