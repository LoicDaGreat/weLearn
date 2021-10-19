<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LecturersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
  
    public function run()
    {
        
        DB::table('lecturers')->insert(array(
        	array(
				'first_name' => "Steve",
                'last_name' => "wonder",
				'email' => 'steve@gmail.com',
				'password' => bcrypt('123456'),
        	),
        	array(
				'first_name' => "Laura",
                'last_name' => "wonder",
				'email' => 'laura@gmail.com',
				'password' => bcrypt('123456'),
        	)
        ));

    }
}
    

