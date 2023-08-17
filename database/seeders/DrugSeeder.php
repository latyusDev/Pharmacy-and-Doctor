<?php

namespace Database\Seeders;

use App\Models\Drug;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DrugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Drug::insert([
            [
                'name'=>'Paracetamol',
                'pharmacy_id'=>1,
                'quantity'=>9,
                'price'=>300.00,
                'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo
                                quasi,quibusdam nesciunt ipsum ducimus adipisci dolor. Saepe facer
                                e fugiat cum iure nam ducimus cumque quam quos quidem omnis nulla deserunt 
                                eaque culpa quasi hic corrupti ullam, quibusdam expedita dolorum commodi!',
            ],
            [
                'name'=>'Panadol',
                'pharmacy_id'=>1,
                'quantity'=>9,
                'price'=>200.00,
                'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo
                                quasi,quibusdam nesciunt ipsum ducimus adipisci dolor. Saepe facer
                                e fugiat cum iure nam ducimus cumque quam quos quidem omnis nulla deserunt 
                                eaque culpa quasi hic corrupti ullam, quibusdam expedita dolorum commodi!',
            ],
            [
                'name'=>'Folic acid',
                'pharmacy_id'=>1,
                'quantity'=>9,
                'price'=>300.00,
                'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo
                                quasi,quibusdam nesciunt ipsum ducimus adipisci dolor. Saepe facer
                                e fugiat cum iure nam ducimus cumque quam quos quidem omnis nulla deserunt 
                                eaque culpa quasi hic corrupti ullam, quibusdam expedita dolorum commodi!',
            ],
            [
                'name'=>'Paracetamol',
                'pharmacy_id'=>1,
                'quantity'=>9,
                'price'=>300.00,
                'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo
                                quasi,quibusdam nesciunt ipsum ducimus adipisci dolor. Saepe facer
                                e fugiat cum iure nam ducimus cumque quam quos quidem omnis nulla deserunt 
                                eaque culpa quasi hic corrupti ullam, quibusdam expedita dolorum commodi!',
            ],
            [
                'name'=>'Palodrine',
                'pharmacy_id'=>2,
                'quantity'=>5,
                'price'=>800.00,
                'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo
                                quasi,quibusdam nesciunt ipsum ducimus adipisci dolor. Saepe facer
                                e fugiat cum iure nam ducimus cumque quam quos quidem omnis nulla deserunt 
                                eaque culpa quasi hic corrupti ullam, quibusdam expedita dolorum commodi!',
            ],
            [
                'name'=>'Novagen',
                'pharmacy_id'=>2,
                'quantity'=>8,
                'price'=>700.00,
                'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo
                                quasi,quibusdam nesciunt ipsum ducimus adipisci dolor. Saepe facer
                                e fugiat cum iure nam ducimus cumque quam quos quidem omnis nulla deserunt 
                                eaque culpa quasi hic corrupti ullam, quibusdam expedita dolorum commodi!',
            ],
            // pharmacy 3
            [
                'name'=>'Paracetamol',
                'pharmacy_id'=>3,
                'quantity'=>9,
                'price'=>300.00,
                'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo
                                quasi,quibusdam nesciunt ipsum ducimus adipisci dolor. Saepe facer
                                e fugiat cum iure nam ducimus cumque quam quos quidem omnis nulla deserunt 
                                eaque culpa quasi hic corrupti ullam, quibusdam expedita dolorum commodi!',
            ],
            [
                'name'=>'Ibu',
                'pharmacy_id'=>3,
                'quantity'=>8,
                'price'=>200.00,
                'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo
                                quasi,quibusdam nesciunt ipsum ducimus adipisci dolor. Saepe facer
                                e fugiat cum iure nam ducimus cumque quam quos quidem omnis nulla deserunt 
                                eaque culpa quasi hic corrupti ullam, quibusdam expedita dolorum commodi!',
            ],
            [
                'name'=>'Fevin',
                'pharmacy_id'=>3,
                'quantity'=>9,
                'price'=>1000.00,
                'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo
                                quasi,quibusdam nesciunt ipsum ducimus adipisci dolor. Saepe facer
                                e fugiat cum iure nam ducimus cumque quam quos quidem omnis nulla deserunt 
                                eaque culpa quasi hic corrupti ullam, quibusdam expedita dolorum commodi!',
            ],
            [
                'name'=>'Eve',
                'pharmacy_id'=>4,
                'quantity'=>9,
                'price'=>600.00,
                'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo
                                quasi,quibusdam nesciunt ipsum ducimus adipisci dolor. Saepe facer
                                e fugiat cum iure nam ducimus cumque quam quos quidem omnis nulla deserunt 
                                eaque culpa quasi hic corrupti ullam, quibusdam expedita dolorum commodi!',
            ],
            [
                'name'=>'Fiter',
                'pharmacy_id'=>4,
                'quantity'=>8,
                'price'=>200.00,
                'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo
                                quasi,quibusdam nesciunt ipsum ducimus adipisci dolor. Saepe facer
                                e fugiat cum iure nam ducimus cumque quam quos quidem omnis nulla deserunt 
                                eaque culpa quasi hic corrupti ullam, quibusdam expedita dolorum commodi!',
            ],
            [
                'name'=>'Fevin',
                'pharmacy_id'=>4,
                'quantity'=>9,
                'price'=>1000.00,
                'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo
                                quasi,quibusdam nesciunt ipsum ducimus adipisci dolor. Saepe facer
                                e fugiat cum iure nam ducimus cumque quam quos quidem omnis nulla deserunt 
                                eaque culpa quasi hic corrupti ullam, quibusdam expedita dolorum commodi!',
            ],

        ]);
    }
}
