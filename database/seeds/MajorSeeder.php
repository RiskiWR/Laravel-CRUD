<?php

use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' =>'SIJA'],
            ['name' =>'TKJ'],
            ['name' =>'RPL'],
            ['name' =>'TKR'],
            ['name' =>'DPIB']
        ];

        foreach ($data as $major) {
            DB::table('majors')->insert($major);
        }
       
    }
}
