<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $properties = [
            [
                'name' => 'Цвет',
                'options' => [
                    [
                        'name' => 'Белый',
                    ],
                    [
                        'name' => 'Черный',
                    ],
                    [
                        'name' => 'Серебристый',
                    ],
                    [
                        'name' => 'Золотой',
                    ],
                    [
                        'name' => 'Красный',
                    ],
                    [
                        'name' => 'Синий',
                    ],
                ],
            ],
            [
                'name' => 'Внутренняя память',
                'options' => [
                    [
                        'name' => '32гб',
                    ],
                    [
                        'name' => '64гб',
                    ],
                    [
                        'name' => '128гб',
                    ],
                ],
            ],
        ];

        foreach ($properties as $property) {
            $property['created_at'] = Carbon::now();
            $property['updated_at'] = Carbon::now();
            $options = $property['options'];
            unset($property['options']);
            $propertyId = DB::table('properties')->insertGetId($property);

            foreach ($options as $option) {
                $option['created_at'] = Carbon::now();
                $option['updated_at'] = Carbon::now();
                $option['property_id'] = $propertyId;
                DB::table('property_options')->insert($option);
            }
        }

        $categories = [
            [
                'name' => 'Мобильные телефоны',
                'code' => 'mobiles',
                'description' => 'В этом разделе вы найдёте самые популярные мобильные телефонамы по отличным ценам!',
                'image' => 'categories/mobile.jpg',
                'products' => [
                    [
                        'name' => 'iPhone X',
                        'code' => 'iphone_x',
                        'description' => 'Отличный продвинутый телефон',
                        'image' => 'products/iphone_x.jpg',
                        'properties' => [
                            1, 2,
                        ],
                        'options' => [
                            [
                                1, 7,
                            ],
                            [
                                1, 8,
                            ],
                            [
                                2, 7,
                            ],
                            [
                                2, 8,
                            ],
                            [
                                3, 7,
                            ],
                            [
                                3, 8,
                            ],
                            [
                                4, 7,
                            ],
                            [
                                4, 8,
                            ],
                        ],
                    ],
                    [
                        'name' => 'iPhone XL',
                        'code' => 'iphone_xl',
                        'description' => 'Огромный продвинутый телефон',
                        'image' => 'products/iphone_x_silver.jpg',
                        'properties' => [
                            1, 2,
                        ],
                        'options' => [
                            [
                                1, 8,
                            ],
                            [
                                1, 9,
                            ],
                            [
                                2, 8,
                            ],
                            [
                                2, 9,
                            ],
                            [
                                3, 8,
                            ],
                            [
                                3, 9,
                            ],
                            [
                                4, 8,
                            ],
                            [
                                4, 9,
                            ],
                        ],
                    ],
                    [
                        'name' => 'HTC One S',
                        'code' => 'htc_one_s',
                        'description' => 'Зачем платить за лишнее? Легендарный HTC One S',
                        'image' => 'products/htc_one_s.png',
                        'properties' => [
                            1, 2,
                        ],
                        'options' => [
                            [
                                2, 7,
                            ],
                            [
                                2, 8,
                            ],
                        ],
                    ],
                    [
                        'name' => 'iPhone 5SE',
                        'code' => 'iphone_5se',
                        'description' => 'Отличный классический iPhone',
                        'image' => 'products/iphone_5.jpg',
                        'properties' => [
                            1, 2,
                        ],
                        'options' => [
                            [
                                1, 7,
                            ],
                            [
                                1, 8,
                            ],
                            [
                                3, 7,
                            ],
                            [
                                3, 8,
                            ],
                            [
                                4, 7,
                            ],
                            [
                                4, 8,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Samsung Galaxy J6',
                        'code' => 'samsung_j6',
                        'description' => 'Современный телефон начального уровня',
                        'image' => 'products/samsung_j6.jpg',
                        'properties' => [
                            1, 2,
                        ],
                        'options' => [
                            [
                                4, 7,
                            ],
                        ],
                    ],
                ]
            ],
            [
                'name' => 'Портативная техника',
                'code' => 'portable',
                'description' => 'Раздел с портативной техникой.',
                'image' => 'categories/portable.jpg',
                'products' => [
                    [
                        'name' => 'Наушники Beats Audio',
                        'code' => 'beats_audio',
                        'description' => 'Отличный звук от Dr. Dre',
                        'image' => 'products/beats.jpg',
                        'properties' => [
                            1,
                        ],
                        'options' => [
                            [
                                2,
                            ],
                            [
                                5,
                            ],
                            [
                                6,
                            ]
                        ],
                    ],
                    [
                        'name' => 'Камера GoPro',
                        'code' => 'gopro',
                        'description' => 'Снимай самые яркие моменты с помощью этой камеры',
                        'image' => 'products/gopro.jpg',
                    ],
                    [
                        'name' => 'Камера Panasonic HC-V770',
                        'code' => 'panasonic_hc-v770',
                        'description' => 'Для серьёзной видео съемки нужна серьёзная камера. Panasonic HC-V770 для этих целей лучший выбор!',
                        'image' => 'products/video_panasonic.jpg',
                    ],
                ],
            ],
            [
                'name' => 'Бытовая техника',
                'code' => 'appliances',
                'description' => 'Раздел с бытовой техникой',
                'image' => 'categories/appliance.jpg',
                'products' => [
                    [
                        'name' => 'Кофемашина DeLongi',
                        'code' => 'delongi',
                        'description' => 'Хорошее утро начинается с хорошего кофе!',
                        'image' => 'products/delongi.jpg',
                        'properties' => [
                            1,
                        ],
                        'options' => [
                            [
                                2,
                            ],
                            [
                                5,
                            ],
                            [
                                6,
                            ],
                        ],
                    ],
                    [
                        'name' => 'Холодильник Haier',
                        'code' => 'haier',
                        'description' => 'Для большой семьи большой холодильник!',
                        'image' => 'products/haier.jpg',
                        'properties' => [
                            1,
                        ],
                        'options' => [
                            [
                                1,
                            ],
                            [
                                2,
                            ],
                            [
                                3,
                            ]
                        ],
                    ],
                    [
                        'name' => 'Блендер Moulinex',
                        'code' => 'moulinex',
                        'description' => 'Для самых смелых идей',
                        'image' => 'products/moulinex.jpg',

                    ],
                    [
                        'name' => 'Мясорубка Bosch',
                        'code' => 'bosch',
                        'description' => 'Любите домашние котлеты? Вам определенно стоит посмотреть на эту мясорубку!',
                        'image' => 'products/bosch.jpg',
                    ],
                ],
            ]
        ];

        foreach ($categories as $category) {
            $category['created_at'] = Carbon::now();
            $category['updated_at'] = Carbon::now();
            $products = $category['products'];
            unset($category['products']);
            $categoryId = DB::table('categories')->insertGetId($category);

            foreach ($products as $product) {
                $product['created_at'] = Carbon::now();
                $product['updated_at'] = Carbon::now();
                $product['hit'] = !boolval(rand(0, 3));
                $product['recommend'] = rand(0, 1);
                $product['new'] = rand(0, 1);
                $product['category_id'] = $categoryId;

                if (isset($product['properties'])) {
                    $properties = $product['properties'];
                    unset($product['properties']);
                    $skusOptions = $product['options'];
                    unset($product['options']);
                }

                $productId = DB::table('products')->insertGetId($product);

                if (isset($properties)) {
                    foreach ($properties as $propertyId) {
                        DB::table('property_product')->insert([
                            'product_id' => $productId,
                            'property_id' => $propertyId,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ]);
                    }

                    foreach ($skusOptions as $skuOptions) {
                        $skuId = DB::table('skus')->insertGetId([
                            'product_id' => $productId,
                            'count' => rand(1, 100),
                            'price' => rand(5000, 100000),
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ]);

                        foreach ($skuOptions as $skuOption) {
                            $skuData['sku_id'] = $skuId;
                            $skuData['property_option_id'] = $skuOption;
                            $skuData['created_at'] = Carbon::now();
                            $skuData['updated_at'] = Carbon::now();

                            DB::table('sku_property_option')->insert($skuData);
                        }
                    }

                    unset($properties);
                } else {
                    DB::table('skus')->insert([
                        'product_id' => $productId,
                        'count' => rand(1, 100),
                        'price' => rand(5000, 100000),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
            }
        }
    }
}
