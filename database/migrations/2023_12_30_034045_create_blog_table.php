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
        Schema::create('blog', function (Blueprint $table) {
            $table->bigInteger("id")->primary();
            $table->text("content");
            $table->bigInteger("userId");
            $table->dateTime("createdAt");
            $table->dateTime("updatedAt");
            $table->bigInteger("createdBy");
            $table->bigInteger("updatedBy");
            $table->string("status");
        });
        Schema::table('blog', function (Blueprint $table) {
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
        Schema::dropIfExists('blog');
    }
};
