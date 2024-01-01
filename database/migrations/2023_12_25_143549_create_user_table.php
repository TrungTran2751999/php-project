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
        Schema::create('user', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            $table->string("userName");
            $table->string("name");
            $table->string("password");
            $table->string("email");
            $table->string("role");
            $table->string("image")->nullable();
            $table->dateTime("createdAt");
            $table->dateTime("updatedAt");
            $table->bigInteger("createdBy");
            $table->bigInteger("updatedBy");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
};
