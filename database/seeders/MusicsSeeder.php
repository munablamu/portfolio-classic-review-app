<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MusicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // https://classicalmusiconly.com/list/100-greatest-classical-music-works-f164de5b から引用
        $musics = [
            /************************ Bach ************************/
            [
                'title' => 'Mass in B Minor',
                'opus' => null,
                'composer_id' => 1
            ],
            [
                'title' => 'St Matthew Passion (Matthäus-Passion)',
                'opus' => 'BWV 244',
                'composer_id' => 1
            ],
            [
                'title' => 'The Well-Tempered Clavier',
                'opus' => 'BWV 846-893',
                'composer_id' => 1
            ],
            [
                'title' => 'Passacaglia and Fugue in C Minor',
                'opus' => 'BWV 582',
                'composer_id' => 1
            ],
            [
                'title' => 'Goldberg Variations',
                'opus' => 'BWV 988',
                'composer_id' => 1
            ],
            [
                'title' => 'Sonatas and Partitas for Solo Violin',
                'opus' => 'BWV 1001-1006',
                'composer_id' => 1
            ],
            /************************ Wagner ************************/
            [
                'title' => 'Der Ring des Nibelungen (The Ring of the Nibelung)',
                'opus' => 'WWV 86',
                'composer_id' => 2
            ],
            [
                'title' => 'Tristan und Isolde (Tristan and Isolde)',
                'opus' => 'WWV 90',
                'composer_id' => 2
            ],
            [
                'title' => 'Parsifal',
                'opus' => 'WWV 111',
                'composer_id' => 2
            ],
            [
                'title' => 'Die Meistersinger von Nürnberg',
                'opus' => 'WWV 96',
                'composer_id' => 2
            ],
            /************************ Beethoven ************************/
            [
                'title' => 'Symphony No. 9 in D Minor',
                'opus' => 'Op. 125',
                'composer_id' => 3
            ],
            [
                'title' => 'Symphony No. 5 in C Minor',
                'opus' => 'Op. 67',
                'composer_id' => 3
            ],
            [
                'title' => 'String Quartet No. 14 in C-sharp Minor',
                'opus' => 'Op. 131',
                'composer_id' => 3
            ],
            [
                'title' => 'Symphony No. 3 in E-flat Major (Heroic Symphony)',
                'opus' => 'Op. 55',
                'composer_id' => 3
            ],
            [
                'title' => 'Piano Sonata No. 23 in F Minor (Appassionata)',
                'opus' => 'Op. 57',
                'composer_id' => 3
            ],
            [
                'title' => 'Piano Concerto No. 5 in E-flat Major (Emperor Concerto)',
                'opus' => 'Op. 73',
                'composer_id' => 3
            ],
            [
                'title' => 'Symphony No. 6 in F Major (Pastoral Symphony)',
                'opus' => 'Op. 68',
                'composer_id' => 3
            ],
            [
                'title' => 'Violin Concerto in D Major',
                'opus' => 'Op. 61',
                'composer_id' => 3
            ],
            [
                'title' => 'Missa solemnis in D Major',
                'opus' => 'Op. 123',
                'composer_id' => 3
            ],
            [
                'title' => 'Piano Sonata No. 14 in C-sharp Minor (Moonlight Sonata)',
                'opus' => 'Op. 27',
                'composer_id' => 3
            ],
            [
                'title' => 'String Quartet No. 13 in B-flat Major',
                'opus' => 'Op. 130',
                'composer_id' => 3
            ],
            [
                'title' => 'Symphony No. 7 in A Major',
                'opus' => 'Op. 92',
                'composer_id' => 3
            ],
            [
                'title' => 'Piano Concerto No. 4 in G Major',
                'opus' => 'Op. 58',
                'composer_id' => 3
            ],
            [
                'title' => 'String Quartet No. 15 in A Minor',
                'opus' => 'Op. 132',
                'composer_id' => 3
            ],
            [
                'title' => 'Piano Sonata No. 32 in C Minor',
                'opus' => 'Op. 111',
                'composer_id' => 3
            ],
            /************************ Mozart ************************/
            [
                'title' => 'Don Giovanni',
                'opus' => 'K. 527',
                'composer_id' => 4
            ],
            [
                'title' => 'The Marriage of Figaro (Le nozze di Figaro)',
                'opus' => ' K. 492',
                'composer_id' => 4
            ],
            [
                'title' => 'Symphony No. 41 in C Major (Jupiter Symphony)',
                'opus' => 'K. 551',
                'composer_id' => 4
            ],
            [
                'title' => 'Piano Concerto No. 20 in D Minor',
                'opus' => 'K. 466',
                'composer_id' => 4
            ],
            [
                'title' => 'Symphony No. 40 in G Minor',
                'opus' => 'K. 550',
                'composer_id' => 4
            ],
            [
                'title' => 'Clarinet Quintet in A Major',
                'opus' => 'K. 581',
                'composer_id' => 4
            ],
            [
                'title' => 'String Quintet No. 4 in G Minor',
                'opus' => 'K. 516',
                'composer_id' => 4
            ],
            [
                'title' => 'The Magic Flute (Die Zauberflöte)',
                'opus' => 'K. 620',
                'composer_id' => 4
            ],
            [
                'title' => 'Piano Concerto No. 21 in C Major',
                'opus' => 'K. 467',
                'composer_id' => 4
            ],
            [
                'title' => 'Piano Concerto No. 24 in C Minor',
                'opus' => 'K. 491',
                'composer_id' => 4
            ],
            [
                'title' => 'Requiem in D Minor',
                'opus' => 'K. 626',
                'composer_id' => 4
            ],
            [
                'title' => 'Symphony No. 39 in E-flat Major',
                'opus' => 'K. 543',
                'composer_id' => 4
            ],
            /************************ Handel ************************/
            [
                'title' => 'Messiah',
                'opus' => 'HWV 56',
                'composer_id' => 5
            ],
            [
                'title' => 'Water Music',
                'opus' => 'HWV 348-350',
                'composer_id' => 5
            ],
            /************************ Stravinsky ************************/
            [
                'title' => 'The Rite of Spring (Le Sacre du printemps)',
                'opus' => null,
                'composer_id' => 6
            ],
            [
                'title' => 'Petrushka',
                'opus' => null,
                'composer_id' => 6
            ],
            /************************ Tchaikovsky ************************/
            [
                'title' => 'Symphony No. 6 in B Minor (Pathétique)',
                'opus' => 'Op. 74',
                'composer_id' => 7
            ],
            [
                'title' => 'The Nutcracker',
                'opus' => 'Op. 71',
                'composer_id' => 7
            ],
            [
                'title' => 'Swan Lake',
                'opus' => 'Op. 20',
                'composer_id' => 7
            ],
            [
                'title' => 'Piano Concerto No. 1 in B-flat Minor',
                'opus' => 'Op. 23',
                'composer_id' => 7
            ],
            [
                'title' => 'The Sleeping Beauty',
                'opus' => 'Op. 66',
                'composer_id' => 7
            ],
            [
                'title' => 'Romeo and Juliet',
                'opus' => null,
                'composer_id' => 7
            ],
            /************************ Verdi ************************/
            [
                'title' => 'Otello',
                'opus' => null,
                'composer_id' => 8
            ],
            [
                'title' => 'Aida',
                'opus' => null,
                'composer_id' => 8
            ],
            [
                'title' => 'Requiem',
                'opus' => null,
                'composer_id' => 8
            ],
            [
                'title' => 'La traviata',
                'opus' => null,
                'composer_id' => 8
            ],
            /************************ Dvořák ************************/
            [
                'title' => 'Symphony No. 9 (From the New World)',
                'opus' => 'Op. 95, B. 178',
                'composer_id' => 9
            ],
            [
                'title' => 'Cello Concerto in B Minor',
                'opus' => '104, B. 191',
                'composer_id' => 9
            ],
            /************************ Schubert ************************/
            [
                'title' => 'Winterreise',
                'opus' => 'D. 911',
                'composer_id' => 10
            ],
            [
                'title' => 'String Quintet in C Major (Cello Quintet)',
                'opus' => 'posth. 163',
                'composer_id' => 10
            ],
            [
                'title' => 'Symphony No. 9 in C Major (The Great C major)',
                'opus' => 'D. 944',
                'composer_id' => 10
            ],
            [
                'title' => 'Piano Sonata No. 21 in B-flat Major',
                'opus' => 'D. 960',
                'composer_id' => 10
            ],
            [
                'title' => 'Symphony No. 8 in B Minor (Unfinished Symphony)',
                'opus' => 'D. 759',
                'composer_id' => 10
            ],
            [
                'title' => 'String Quartet No. 14 in D Minor (Death and the Maiden)',
                'opus' => 'D. 810',
                'composer_id' => 10
            ],
            [
                'title' => 'Piano Quintet in A Major (Trout Quintet)',
                'opus' => 'D. 667',
                'composer_id' => 10
            ],
            /************************ Brahms ************************/
            [
                'title' => 'Piano Concerto No. 2 in B-flat Major',
                'opus' => 'Op. 83',
                'composer_id' => 11
            ],
            [
                'title' => 'Symphony No. 4 in E Minor',
                'opus' => 'Op. 98',
                'composer_id' => 11
            ],
            [
                'title' => 'Clarinet Quintet in B Minor',
                'opus' => 'Op. 115',
                'composer_id' => 11
            ],
            [
                'title' => 'Violin Concerto in D Major',
                'opus' => 'Op. 77',
                'composer_id' => 11
            ],
            [
                'title' => 'Symphony No. 3 in F Major',
                'opus' => 'Op. 90',
                'composer_id' => 11
            ],
            /************************ Schumann ************************/
            [
                'title' => 'Piano Concerto in A Minor',
                'opus' => 'Op. 54',
                'composer_id' => 12
            ],
            /************************ Mendelssohn ************************/
            [
                'title' => " A Midsummer Night's Dream Overtur",
                'opus' => 'Op. 21',
                'composer_id' => 13
            ],
            [
                'title' => 'Violin Concerto in E Minor',
                'opus' => 'Op. 64',
                'composer_id' => 13
            ],
            /************************ Mussorgsky ************************/
            [
                'title' => 'Pictures at an Exhibition',
                'opus' => null,
                'composer_id' => 14
            ],
            [
                'title' => 'Boris Godunov',
                'opus' => null,
                'composer_id' => 14
            ],
            /************************ Debussy ************************/
            [
                'title' => "Prélude à l'après-midi d'un faune (Prelude to the Afternoon of a Faun)",
                'opus' => 'L. 86',
                'composer_id' => 15
            ],
            [
                'title' => 'La mer (The Sea)',
                'opus' => 'L. 109',
                'composer_id' => 15
            ],
            [
                'title' => 'Préludes',
                'opus' => 'L. 117 & L.123',
                'composer_id' => 15
            ],
            /************************ Berlioz ************************/
            [
                'title' => "Symphonie fantastique",
                'opus' => 'H 48',
                'composer_id' => 16
            ],
            /************************ Puccini ************************/
            [
                'title' => "La bohème",
                'opus' => null,
                'composer_id' => 17
            ],
            [
                'title' => "Madama Butterfly",
                'opus' => null,
                'composer_id' => 17
            ],
            /************************ Liszt ************************/
            [
                'title' => "Sonata in B Minor",
                'opus' => 'S. 178',
                'composer_id' => 18
            ],
            /************************ Vivaldi ************************/
            [
                'title' => "The Four Seasons (Le Quattro Stagioni)",
                'opus' => null,
                'composer_id' => 19
            ],
            /************************ Strauss ************************/
            [
                'title' => "Till Eulenspiegels lustige Streiche (Till Eulenspiegel's Merry Pranks)",
                'opus' => 'Op. 28',
                'composer_id' => 20
            ],
            [
                'title' => "Also sprach Zarathustra (Thus Spoke Zarathustra)",
                'opus' => 'Op. 30',
                'composer_id' => 20
            ],
            [
                'title' => "Ein Heldenleben (A Hero's Life)",
                'opus' => 'Op. 40',
                'composer_id' => 20
            ],
            [
                'title' => "Der Rosenkavalier (The Knight of the Rose)",
                'opus' => 'Op. 59',
                'composer_id' => 20
            ],
            /************************ Mahler ************************/
            [
                'title' => "Symphony No. 5",
                'opus' => null,
                'composer_id' => 21
            ],
            [
                'title' => "Symphony No. 2 in C Minor (Resurrection)",
                'opus' => null,
                'composer_id' => 21
            ],
            /************************ Sibelius ************************/
            [
                'title' => "Symphony No. 2 in D Major",
                'opus' => 'Op. 43',
                'composer_id' => 22
            ],
            [
                'title' => "Finlandia",
                'opus' => 'Op. 26',
                'composer_id' => 22
            ],
            /************************ Fauré ************************/
            [
                'title' => "Requiem in D Minor",
                'opus' => 'Op. 48',
                'composer_id' => 23
            ],
            /************************ Rachmaninoff ************************/
            [
                'title' => "Piano Concerto No. 2 in C Minor",
                'opus' => 'Op. 18',
                'composer_id' => 24
            ],
            /************************ Chopin ************************/
            [
                'title' => "24 preludes",
                'opus' => 'Op. 28',
                'composer_id' => 25
            ],
            [
                'title' => "Polonaise in A-flat Major (Heroic)",
                'opus' => 'Op. 53',
                'composer_id' => 25
            ],
            /************************ Grieg ************************/
            [
                'title' => "Piano Concerto",
                'opus' => 'Op. 16',
                'composer_id' => 26
            ],
            /************************ Shostakovich ************************/
            [
                'title' => "Symphony No. 10 in E Minor",
                'opus' => 'Op. 93',
                'composer_id' => 27
            ],
            [
                'title' => "Symphony No. 5 in D Minor",
                'opus' => 'Op. 47',
                'composer_id' => 27
            ],
            /************************ Copland ************************/
            [
                'title' => "Appalachian Spring",
                'opus' => null,
                'composer_id' => 28
            ],
            /************************ Bizet ************************/
            [
                'title' => "Carmen",
                'opus' => null,
                'composer_id' => 29
            ],
            /************************ Rimsky-Korsakov ************************/
            [
                'title' => "Scheherazade",
                'opus' => 'Op. 35',
                'composer_id' => 30
            ],
            /************************ Palestrina ************************/
            [
                'title' => "Missa Papae Marcelli",
                'opus' => null,
                'composer_id' => 31
            ],
            /************************ Haydn ************************/
            [
                'title' => "The Creation (Die Schöpfung)",
                'opus' => 'Hob. XXI:2',
                'composer_id' => 32
            ],
            /************************ Bruckner ************************/
            [
                'title' => "Symphony No. 7 in E Major (Lyric)",
                'opus' => 'WAB 107',
                'composer_id' => 33
            ],
            /************************ Bartók ************************/
            [
                'title' => "Concerto for Orchestra",
                'opus' => '116, BB 123',
                'composer_id' => 34
            ],
        ];

        foreach ( $musics as $i_music ) {
            DB::table('musics')->insert([
                'title' => $i_music['title'],
                'opus' => $i_music['opus'],
                'composer_id' => $i_music['composer_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
