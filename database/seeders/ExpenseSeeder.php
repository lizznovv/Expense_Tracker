<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpenseSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('expense')->insert([
            [
                'amount' => 5000,
                'category' => 'food',
                'description' => 'Food',
                'date' => '2025-11-1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'amount' => 2600,
                'category' => 'transport',
                'description' => 'Taxi',
                'date' => '2025-11-1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'amount' => 1000,
                'category' => 'utilities',
                'description' => 'Utilities',
                'date' => '2025-11-4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'amount' => 3700,
                'category' => 'entertainment',
                'description' => 'Games',
                'date' => '2025-10-29',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'amount' => 900,
                'category' => 'shopping',
                'description' => 'Clothes',
                'date' => '2025-10-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'amount' => 3200,
                'category' => 'food',
                'description' => 'Restaurants',
                'date' => '2025-10-18',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'amount' => 1500,
                'category' => 'entertainment',
                'description' => 'Cinema and snacks',
                'date' => '2025-11-3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'amount' => 800,
                'category' => 'food',
                'description' => 'Groceries',
                'date' => '2025-11-4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'amount' => 2200,
                'category' => 'transport',
                'description' => 'Fuel for car',
                'date' => '2025-10-30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'amount' => 950,
                'category' => 'other',
                'description' => 'Gift for friend',
                'date' => '2025-11-5',
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}
