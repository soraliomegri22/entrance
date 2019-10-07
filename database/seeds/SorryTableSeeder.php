<?php

use Illuminate\Database\Seeder;

class SorryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('men')->insert([
            [
              'id' => '1',
              'name' => 'ごめんなさい',
              'women_id' => '2',
            ],
        ]);
  
        DB::table('women')->insert([

            [
                'id' => '1',
                'name' => 'ごめんなさい',
                'men_id' => '2',
            ],
        ]);

    }
}
