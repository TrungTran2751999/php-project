<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizer', function (Blueprint $table) {
            $table->bigInteger("id")->primary();
            $table->string("name");
            $table->string("tenVietTat");
            $table->string("image",500);
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
        Schema::dropIfExists('organizer');
    }
}
