<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->cardSets() as $set) {
            DB::table('cards')->insert([
                'description' => $set['desc'],
                'card_set' => collect($set['set'])->toJson(),
            ]);
        }
    }

    public function cardSets(): array
    {
        return [
            [
                'desc' => 'Fibonacci Short',
                'set' => ['1', '2', '3', '5', '8'],
            ],
            [
                'desc' => 'Standard Fibonacci ',
                'set' => ['1', '2', '3', '5', '8', '13', '20', '40', '100'],
            ],
            [
                'desc' => 'Standard Fibonacci with \'?\' for unclear stories',
                'set' => ['1', '2', '3', '5', '8', '13', '20', '40', '?'],
            ],
            [
                'desc' => 'Powers of two',
                'set' => ['0', '1', '2', '4', '8', '16', '32', '64'],
            ],
            [
                'desc' => 'Card set used to estimate hours as different fractions and multiples of a working day',
                'set' => ['1', '2', '4', '8', '12', '16', '24', '32', '40'],
            ],
            // [
            //     'desc' => 'T-shirt Size',
            //     'set' => ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL', '?'],
            // ],
        ];
    }
}
