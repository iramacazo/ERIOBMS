<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentRequisitionSlipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_requisition_slips', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('requested_by');
            $table->string('prs_id');
            $table->timestamps();
            $table->foreign('prs_id')->references('id')->on('transactions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_requisition_slips');
    }
}
