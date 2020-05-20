<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 20; $i++) {

            // insert data ke table pegawai menggunakan Faker
            DB::table('students')->insert([
                'name' => $faker->name,
                'major_id' => $faker->numberBetween(1, 5),
                'grade_id' => $faker->numberBetween(1, 3)
            ]);
        }
 


        
    }
}
