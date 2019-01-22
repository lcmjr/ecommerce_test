<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
                'name'     => 'Teste',
                'cpf'      => '74552859064',
                'phone'    => '11986985535',
                'email'    => 'teste@teste.com',
                'zip_code' => '19910002',
                'state'    => 'sp',
                'city'     => 'Ourinhos',
                'district' => 'Loteamento Mitsui',
                'address'  => 'Rua Aguinair Cardoso da Silva'
            ]
        );

        DB::table('order_items')->insert([
                [
                    'order_id'    => 1,
                    'product_id'  => 2,
                    'quantity'    => 1,
                    'sale_price'  => 358.99,
                    'total_price' => 358.99,
                ],
                [
                    'order_id'    => 1,
                    'product_id'  => 3,
                    'quantity'    => 1,
                    'sale_price'  => 746.99,
                    'total_price' => 746.99,
                ]
            ]
        );
    }
}
