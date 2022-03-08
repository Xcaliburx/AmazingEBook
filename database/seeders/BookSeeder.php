<?php

namespace Database\Seeders;

use App\Models\Ebook;
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
        //
        EBook::create([
            'ebook_id' => '1',
            'title' => 'Book 1',
            'author' => 'Author 1',
            'description' => 'Ini buku 1'
        ]);

        EBook::create([
            'ebook_id' => '2',
            'title' => 'Book 2',
            'author' => 'Author 2',
            'description' => 'Ini buku 2'
        ]);

        EBook::create([
            'ebook_id' => '3',
            'title' => 'Book 3',
            'author' => 'Author 3',
            'description' => 'Ini buku 3'
        ]);

        EBook::create([
            'ebook_id' => '4',
            'title' => 'Book 4',
            'author' => 'Author 4',
            'description' => 'Ini buku 4'
        ]);

        EBook::create([
            'ebook_id' => '5',
            'title' => 'Book 5',
            'author' => 'Author 5',
            'description' => 'Ini buku 5'
        ]);
    }
}
