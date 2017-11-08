<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProposedBudgetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proposed_budgets')->insert([
        	'proposing_user' => 'lrteam',
        	'academic_year' => 2016,
        	'approval_status' => true,
        	'supplies' => 135000,
        	'transportation' => 84000,
        	'mailing' => 75500,
        	'meeting_expenses' => 124000,
        	'workshop' => 34000,
        	'mimeo' => 8000,
        	'telephone' => 131000,
        	'repairs_and_maintenance' => 25000,
        	'publication' => 98500,
        	'uniform' => 16500,
        	'international_travel' => 410000,
        	'representation' => 164000,
        	'tokens' => 200000,
        	'commitments_official' => 1230000,
        	'membership' => 50000,
        	'internationalization_programs' => 50000,
        	'support_for_outbound_students' => 50000,
        	'international_events' => 50000,
        	'orientation_programs' => 50000,
        	'commitments_student' => 500000,
        	'activities' => 4100000,
        	'capex' => 117850,
        	'created_at' =>  Carbon::now(),
        	'updated_at' => Carbon::now()
        ]);
    }
}
