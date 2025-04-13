<?php

namespace Database\Factories;

use App\Models\Donation;
use App\Models\Campaign;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DonationFactory extends Factory
{
    protected $model = Donation::class;

    public function definition()
    {
        return [
            'campaign_id' => Campaign::factory(),
            'user_id' => User::factory(),
            'type' => $this->faker->randomElement(['financial', 'goods', 'emotional']),
            'amount' => $this->faker->randomFloat(2, 10, 500),
            'item_description' => $this->faker->word,
            'session_count' => $this->faker->numberBetween(1, 5),
            'donor_name' => $this->faker->name,
        ];
    }
}

