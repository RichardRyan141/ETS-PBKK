<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {

        $imagePaths = [
            'shoe.jpeg',
            'tshirt.jpeg'
        ];

        $productName = [
            'shoe',
            'tshirt',
        ];


        return [
            'name' => $this->faker->randomElement($productName),
            'description' => $this->faker->text,
            'flaws' => $this->faker->optional($weight = 0.1)->text,
            'category_id' => 1,
            'quality_id' => 1,
            'stock' => 0,
            'product_photo' => $this->faker->randomElement($imagePaths),
        ];
    }
}
