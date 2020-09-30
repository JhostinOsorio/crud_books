<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'title' => 'La ciudad y los perros',
            'description' => 'La obra narra las vivencias de los alumnos internos del
                            Colegio Militar Leoncio Prado',
            'editorial' => 'Seix Barral',
            'author' => 'Mario Vargas Llosa',
            'gender' => 'Novela',
            'format' => 'Impreso',
            'year_of_publication' => '1963',
        ]);
        Book::create([
            'title' => 'Padre Rico, Padre Pobre',
            'description' => 'Padre rico y padre pobre es un libro escrito por Robert
                                Kiyosaki y Sharon Lechter.',
            'editorial' => 'Tech Press, 2001',
            'author' => 'Robert Kiyosaki',
            'gender' => 'Entretenimiento',
            'format' => 'Impreso',
            'year_of_publication' => '1997',
        ]);
    }
}
