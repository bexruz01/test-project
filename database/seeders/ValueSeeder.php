<?php

namespace Database\Seeders;

use App\Models\Value;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Value::create([
            'attribute_id' => 1,
            'name' => [
                'uz' => 'qizil',
                'ru' => 'krasniy',
                'en' => 'red'
            ]
        ]);

        Value::create([
            'attribute_id' => 1,
            'name' => [
                'uz' => 'qora',
                'ru' => 'qora_ru',
                'en' => 'qora_en',
            ]
        ]);

        Value::create([
            'attribute_id' => 1,
            'name' => [
                'uz' => 'jigarrrang',
                'ru' => 'jigarrrang_ru',
                'en' => 'jigarrrang_en',
            ]
        ]);

        Value::create([
            'attribute_id' => 2,
            'name' => [
                'uz' => 'MDF',
                'ru' => 'MDF_ru',
                'en' => 'MDF_en'
            ]
        ]);

        Value::create([
            'attribute_id' => 2,
            'name' => [
                'uz' => 'LDCS',
                'ru' => 'LDCS_ru',
                'en' => 'LDCS_en'
            ]
        ]);
    }
}
