<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
   public function run()
{
    Product::insert([
        [
            'name' => 'Black & White Striped Shirt',
            'category' => 'men',
            'price' => 1499,
            'stock' => 15,
            'description' => 'Stylish striped shirt perfect for casual and semi-formal wear.',
            'image' => 'dummy1.jpg',
        ],
        [
            'name' => 'Elegant Red Bodycon Dress',
            'category' => 'women',
            'price' => 1399,
            'stock' => 20,
            'description' => 'Sleek and modern red dress for evening outings.',
            'image' => 'dummy2.jpg',
        ],
        [
            'name' => 'Designer Anarkali Gown',
            'category' => 'women',
            'price' => 3499,
            'stock' => 10,
            'description' => 'Traditional Anarkali with premium embroidery.',
            'image' => 'dummy3.jpg',
        ],
        [
            'name' => 'Royal Pink Lehenga Set',
            'category' => 'women',
            'price' => 4999,
            'stock' => 8,
            'description' => 'Festive lehenga with intricate floral design.',
            'image' => 'dummy4.jpg',
        ],
        [
            'name' => 'Minimal White Kaftan Dress',
            'category' => 'women',
            'price' => 1499,
            'stock' => 12,
            'description' => 'Comfortable and stylish kaftan for daily wear.',
            'image' => 'dummy5.jpg',
        ],
        [
            'name' => 'Classic Black Suit',
            'category' => 'men',
            'price' => 5999,
            'stock' => 6,
            'description' => 'Premium formal suit for special occasions.',
            'image' => 'dummy6.jpg',
        ],
        [
            'name' => 'Casual Denim Jacket',
            'category' => 'women',
            'price' => 1999,
            'stock' => 18,
            'description' => 'Trendy denim jacket for casual outfits.',
            'image' => 'dummy7.jpg',
        ],
        [
            'name' => 'Modern Slim Fit Shirt',
            'category' => 'men',
            'price' => 1299,
            'stock' => 25,
            'description' => 'Slim fit shirt for modern styling.',
            'image' => 'dummy8.jpg',
        ]
    ]);
}   
}
