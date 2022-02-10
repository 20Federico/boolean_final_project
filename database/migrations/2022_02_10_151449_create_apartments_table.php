<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained();
            $table->foreignId("address_id")->constrained();
            $table->string('title');
            $table->longText('description')->nullable();
            $table->string('cover_img');
            $table->integer('price_day');
            $table->smallInteger('n_rooms');
            $table->smallInteger('n_baths');
            $table->smallInteger('n_beds');
            $table->integer('square_meters');
            $table->boolean('visible')->default(true);
            $table->boolean('shared');
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
        Schema::dropIfExists('apartments');
    }
}
