<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [
            [
                'clientId' => 1, 'employeId' => 1, 'productId' => 1, 'quantity' => 3,
            ],
            [
                'clientId' => 2, 'employeId' => 2, 'productId' => 2, 'quantity' => 6,
            ],
            [
                'clientId' => 3, 'employeId' => 3, 'productId' => 3, 'quantity' => 2,
            ],
            [
                'clientId' => 4, 'employeId' => 1, 'productId' => 2, 'quantity' => 8,
            ],
            [
                'clientId' => 5, 'employeId' => 2, 'productId' => 3, 'quantity' => 10,
            ],
        ];

        foreach ($orders as $order) {
            Order::create($order);
        }
    }
}
