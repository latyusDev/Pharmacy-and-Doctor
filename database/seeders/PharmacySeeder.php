<?php

namespace Database\Seeders;

use App\Models\Drug;
use App\Models\Pharmacy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PharmacySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pharmacy::insert([
            [
                'name'=>'Pharmacy One',
                'email'=>'pharmacy1@gmail.com',
                'password'=>bcrypt('aaa'),
            ],
            [
                'name'=>'Pharmacy Two',
                'email'=>'pharmacy2@gmail.com',
                'password'=>bcrypt('aaa'),
            ],
            [
                'name'=>'Pharmacy Three',
                'email'=>'pharmacy3@gmail.com',
                'password'=>bcrypt('aaa'),
            ],
            [
                'name'=>'Pharmacy Four',
                'email'=>'pharmacy4@gmail.com',
                'password'=>bcrypt('aaa'),
            ]
        ]);

    }
}
