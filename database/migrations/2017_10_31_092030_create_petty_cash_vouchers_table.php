<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePettyCashVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petty_cash_vouchers', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_requested');
            $table->date('date_returned');
            $table->decimal('amount_requested', 9,2);
            $table->string('purpose');
            $table->decimal('amount_spent',9,2);
            $table->decimal('amount_returned', 9, 2);
            $table->string('payee');
            $table->string('details');
            $table->string('transaction_id')->nullable($value = true);
            $table->string('pcrf_id')->nullable($value = true);
            $table->foreign('transaction_id')->references('id')->on('transactions');
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
        Schema::dropIfExists('petty_cash_vouchers');
    }
}
