<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('addresses', function (Blueprint $table) {
        $table->string('street_name')->nullable()->change();
        $table->integer('street_number')->nullable()->change();
        $table->string('city')->nullable()->change();
        $table->string('country')->nullable()->change();
        $table->string('zip_code')->nullable()->change();
        $table->decimal('latitude', 9, 6)->change();
        $table->decimal('longitude', 9, 6)->change();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('addresses', function (Blueprint $table) {
        $table->string('street_name')->nullable(false)->change();
        $table->integer('street_number')->nullable(false)->change();
        $table->string('city')->nullable(false)->change();
        $table->string('country')->nullable(false)->change();
        $table->bigInteger('zip_code')->nullable(false)->change();
        $table->decimal('latitude', 8, 5)->change();
        $table->decimal('longitude', 8, 5)->change();
      });
    }
}
