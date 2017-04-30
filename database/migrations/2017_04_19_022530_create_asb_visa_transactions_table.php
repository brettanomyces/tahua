<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsbVisaTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asb_visa_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('date_processed');
            $table->date('date_of_transaction');
            $table->integer('unique_id')->unique();
            $table->string('tran_type');
            $table->text('reference');
            $table->text('description');
            $table->float('amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asb_visa_transactions');
    }
}
