<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([
        [
            'name'        => 'Tumbler',
            'description' => 'Good Tumbler',
            'price'       => 20_000,
            'stock'       => 20,
        ],
        [
            'name'        => 'Potato',
            'description' => 'Delicious Potato',
            'price'       => 3_000,
            'stock'       => 100,
        ],
    ]);
    }
}
