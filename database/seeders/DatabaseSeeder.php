<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Создаем категории из курсовой
        $categories = [
            'Молочная продукция',
            'Мясо и птица',
            'Овощи',
            'Фрукты',
            'Мёд'
        ];

        foreach ($categories as $catName) {
            \App\Models\Category::create(['name' => $catName]);
        }

        // Создаем несколько товаров
        \App\Models\Product::create([
            'name' => 'Молоко деревенское',
            'description' => 'Натуральное молоко от коровы.',
            'price' => 120,
            'category_id' => 1
        ]);

        \App\Models\Product::create([
            'name' => 'Куриное филе',
            'description' => 'Фермерская курица.',
            'price' => 350,
            'category_id' => 2
        ]);

        \App\Models\Product::create([
            'name' => 'Картофель молодой',
            'description' => 'С грядки.',
            'price' => 60,
            'category_id' => 3
        ]);
    }
}
