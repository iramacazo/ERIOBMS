<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProposedBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposed_budgets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('proposing_user');
            $table->integer('academic_year');
            $table->decimal('supplies',9,2);
            $table->decimal('transportation',9,2);
            $table->decimal('mailing',9,2);
            $table->decimal('meeting_expenses',9,2);
            $table->decimal('workshop',9,2);
            $table->decimal('mimeo',9,2);
            $table->decimal('telephone',9,2);
            $table->decimal('repairs_and_maintenance',9,2);
            $table->decimal('publication',9,2);
            $table->decimal('uniform',9,2);
            $table->decimal('international_travel',9,2);
            $table->decimal('representation',9,2);
            $table->decimal('tokens',9,2);
            $table->decimal('commitments_official',9,2);
            $table->decimal('membership',9,2);
            $table->decimal('internationalization_programs',9,2);
            $table->decimal('activities',9,2);
            $table->decimal('capex',9,2);
            $table->decimal('orientation_programs',9,2);
            $table->decimal('commitments_student',9,2);
            $table->decimal('international_events',9,2);
            $table->decimal('support_for_outbound_students',9,2);
            $table->foreign('proposing_user')->references('username')->on('users');
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
        Schema::dropIfExists('proposed_budgets');
    }
}
