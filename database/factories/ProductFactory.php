<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class ProductFactory extends Factory {
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition() {
		$productSuffixes = [ 'Sweater', 'Pants', 'Socks', 'Glasses' ];
		$name            = $this->faker->company . ' ' . Arr::random( $productSuffixes );

		return [
			'name'        => $name,
			'slug'        => Str::slug( $name ),
			'date'        => $this->faker->dateTimeBetween( '+0 days', '+1 years' ),
			'description' => $this->faker->realText( 320 ),
			'price'       => $this->faker->numberBetween( 1000, 10000 ),
		];
	}
}
