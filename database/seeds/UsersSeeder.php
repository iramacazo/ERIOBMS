<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
    		'username' => 'admin',
			'firstname' => 'System',
			'lastname' => 'Admin',
			'email' => 'admin@admin.com',
			'password' => bcrypt('admin1234'),
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now()
    	]);

    	DB::table('users')->insert([
    		'username' => 'lrteam',
			'firstname' => 'LRT',
			'lastname' => 'Team',
			'email' => 'lrteam@dev.com',
			'password' => bcrypt('lrteam123'),
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now()
    	]);
    }
}
