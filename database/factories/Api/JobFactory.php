<?php

namespace Database\Factories\Api;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\api\Job>
 */
class JobFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		$random_tag = Arr::random([
			"Laravel",
			"Node",
			"React",
			"TypeScript",
			"Django",
			"Symphony"
		]);
		$pics = [
			"Laravel" => "https://cdn-icons-png.flaticon.com/512/1485/1485282.png",
			"Symphony" => "https://cdn-icons-png.flaticon.com/512/1485/1485282.png",
			"Node" => "https://cdn-icons-png.flaticon.com/512/919/919825.png", 
			"React" => "https://cdn-icons-png.flaticon.com/512/753/753244.png",
			"TypeScript" => "https://cdn-icons-png.flaticon.com/512/5968/5968381.png",
			"Python" => "https://cdn-icons-png.flaticon.com/512/5968/5968350.png"
		];
		
		
		foreach ($pics as $pic_key => $pic_value) {
			if ($random_tag == $pic_key) {
				global $pic;
				$pic = $pic_value;
			}
		}
		
		
		return [
			'name' => fake()->company(),
			'email' => fake()->unique()->companyEmail(),
			'description' => fake()->unique()->sentence(),
			'tags' => $random_tag,
			'img' => $pic
		];
	}
}
