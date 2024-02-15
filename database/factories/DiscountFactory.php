<?php

namespace Database\Factories;

use App\Enums\DiscountStatus;
use App\Enums\DiscountType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Discount>
 */
class DiscountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'start_at'=>$this->faker->dateTimeInInterval('+10 days', '+30 days'),
            'expire_at'=>$this->faker->dateTimeInInterval('+30 days', '+60 days'),
            'description'=>$this->faker->text,
            'amount'=>$this->faker->numberBetween(1, 9)*10,
            'status'=>DiscountStatus::DISABLE,
            'type'=>DiscountType::PERCENT,
        ];
    }
}
