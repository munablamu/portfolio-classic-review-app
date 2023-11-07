<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComposersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $composers = ['Johann Sebastian Bach', 'Richard Wagner', 'Ludwig van Beethoven',
                    'Wolfgang Amadeus Mozart', 'George Frideric Handel', 'Igor Stravinsky',
                    'Pyotr Ilyich Tchaikovsky', 'Giuseppe Verdi', 'Antonín Dvořák',
                    'Franz Schubert', 'Johannes Brahms', 'Robert Schumann', 'Felix Mendelssohn',
                    'Modest Mussorgsky', 'Claude Debussy', 'Hector Berlioz', 'Giacomo Puccini',
                    'Franz Liszt', 'Antonio Vivaldi', 'Richard Strauss', 'Gustav Mahler',
                    'Jean Sibelius', 'Gabriel Fauré', 'Sergei Rachmaninoff', 'Frédéric Chopin',
                    'Edvard Grieg', 'Dmitri Shostakovich', 'Aaron Copland', 'Georges Bizet',
                    'Nikolai Rimsky-Korsakov', 'Giovanni Pierluigi da Palestrina',
                    'Joseph Haydn', 'Anton Bruckner', 'Béla Bartók'];

        foreach ( $composers as $i_composer ) {
            DB::table('composers')->insert([
                'name' => $i_composer,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
