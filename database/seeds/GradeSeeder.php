<?php

use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'X'],
            ['name' => 'XI'],
            ['name' => 'XII'],
            ['name' => 'XIII']
        ];

        foreach ($data as $grade) {
            DB::table('grades')->insert($grade);
        }
    }
}
