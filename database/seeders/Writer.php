<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Writer as WriterCreate;

class Writer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $data = [
             [
                "name" => 'Marcel Proust'
             ],
             [
                 "name" => 'James Joyce' 
             ],
             [
                 'name' =>  'Miguel de Cervantes'
             ]
        ];

        WriterCreate::insert(
            $data
        );
    }
}
