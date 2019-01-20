<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('features')->insert([
                ['name' => 'Cor', 'value' => 'Branca'],
                ['name' => 'Cor', 'value' => 'Preto'],
                ['name' => 'Cor', 'value' => 'Prata'],
                ['name' => 'Garantia', 'value' => '1 ano'],
                ['name' => 'Garantia', 'value' => '12 meses']
            ]
        );
    }
}
