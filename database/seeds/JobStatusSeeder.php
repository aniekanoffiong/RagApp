<?php

use Illuminate\Database\Seeder;
use App\JobStatus;

class JobStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobStatus::insert([
            ['id' => NULL,'status' => 'Negotiation'],
            ['id' => NULL,'status' => 'Agreement'],
            ['id' => NULL,'status' => 'On-going'],    
            ['id' => NULL,'status' => 'Delivery'] 
        ]);
    }
}
