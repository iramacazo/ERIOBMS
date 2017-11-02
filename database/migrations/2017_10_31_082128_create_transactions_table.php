<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('owner');
            $table->integer('budget_id');
            $table->integer('category');
            $table->date('transaction_date');
            $table->decimal('amount', 9, 2);
            $table->string('item_name');
            $table->string('description');
            $table->integer('term');
            $table->boolean('paid_in_petty_cash');
            $table->string('prs_id')->nullable($value = true);
            $table->foreign('budget_id')->references('id')->on('proposed_budgets');
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
        Schema::dropIfExists('transactions');
    }
}
