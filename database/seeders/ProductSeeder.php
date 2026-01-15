<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            // Best Offer
            ['name' => "Nature's Bounty", 'category' => 'Healthcare', 'price' => 58.00, 'image' => 'images/vitamin1.png'],
            ['name' => "Nature's Bounty C", 'category' => 'Healthcare', 'price' => 36.00, 'image' => 'images/vitamin2.png'],
            ['name' => "Nature's Bounty Bio", 'category' => 'Healthcare', 'price' => 34.00, 'image' => 'images/vitamin3.png'],
            ['name' => "Nature's Bounty Zinc", 'category' => 'Healthcare', 'price' => 38.00, 'image' => 'images/vitamin4.png'],
            
            // Best Sellers
            ['name' => "Nature's Bounty A", 'category' => 'Healthcare', 'price' => 58.00, 'image' => 'images/vitamin5.png'],
            ['name' => "Nature's Bounty B", 'category' => 'Healthcare', 'price' => 20.00, 'image' => 'images/vitamin6.png'],
            ['name' => "Nature's Bounty D", 'category' => 'Healthcare', 'price' => 35.00, 'image' => 'images/vitamin1.png'],
            ['name' => "Nature's Bounty E", 'category' => 'Healthcare', 'price' => 50.00, 'image' => 'images/vitamin2.png'],
            ['name' => "Nature's Bounty F", 'category' => 'Healthcare', 'price' => 56.00, 'image' => 'images/vitamin3.png'],
            ['name' => "Nature's Bounty G", 'category' => 'Healthcare', 'price' => 99.00, 'image' => 'images/vitamin4.png'],
            ['name' => "Nature's Bounty H", 'category' => 'Healthcare', 'price' => 88.00, 'image' => 'images/vitamin5.png'],
            ['name' => "Nature's Bounty I", 'category' => 'Healthcare', 'price' => 53.00, 'image' => 'images/vitamin6.png'],
            ['name' => "Nature's Bounty J", 'category' => 'Healthcare', 'price' => 45.00, 'image' => 'images/vitamin1.png'],
            ['name' => "Nature's Bounty K", 'category' => 'Healthcare', 'price' => 62.00, 'image' => 'images/vitamin2.png'],
            ['name' => "Nature's Bounty L", 'category' => 'Healthcare', 'price' => 29.00, 'image' => 'images/vitamin3.png'],
            ['name' => "Nature's Bounty M", 'category' => 'Healthcare', 'price' => 74.00, 'image' => 'images/vitamin4.png'],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
