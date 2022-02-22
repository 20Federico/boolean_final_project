<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnIdTransactionToSponsorApartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sponsor_apartment', function (Blueprint $table) {
          $table->string('transaction_id')->after('apartment_id');
          $table->dateTime('expiry')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sponsor_apartment', function (Blueprint $table) {
          $table->dropColumn('transaction_id');
          $table->date('expiry')->change();
        });
    }
}
