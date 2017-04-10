<?php

use Illuminate\Database\Seeder;
use App\Categories;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categories::insert([
            ['id' => NULL,'category' => 'Artist'],
            ['id' => NULL,'category' => 'Full Stack Developer'],
            ['id' => NULL,'category' => 'Back-end Web Developer (PHP)'],    
            ['id' => NULL,'category' => 'Back-end Web Developer (Ruby)'],    
            ['id' => NULL,'category' => 'Back-end Web Developer (Python)'],    
            ['id' => NULL,'category' => 'Back-end Web Developer (NodeJS)'],    
            ['id' => NULL,'category' => 'Front-end Web Developer']
        ]);
    }
}
