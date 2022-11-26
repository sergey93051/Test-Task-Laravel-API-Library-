<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Books as BooksCreate;

class Books extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BooksCreate::insert([
               [
                  'name' => 'In Search of Lost Time',
                  'price' => '20$',
                  'writer_id' => 1
               ],
               [
                'name' => 'The Captive',
                'price' => '15$',
                'writer_id' => 1
               ],
               [
                'name' => 'The Sweet Cheat Gone',
                'price' => '18$',                
                'writer_id' => 1
               ],
               [
                 'name' => ' Ulysses',
                'price' => '12$',
                 'writer_id' => 2
                ],
                [
                 'name' => ' Miguel de Cervantes',
                 'price' => '19$',
                  'writer_id' => 3
                ],
            ]);
    }
}
