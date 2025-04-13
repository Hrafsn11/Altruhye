<?php

namespace Database\Factories;

use App\Models\Campaign;
use Illuminate\Database\Eloquent\Factories\Factory;

class CampaignFactory extends Factory
{
    protected $model = Campaign::class;

    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'type' => $this->faker->randomElement(['financial', 'goods', 'emotional']),
            'target_amount' => $this->faker->randomFloat(2, 100, 10000),
            'collected_amount' => $this->faker->randomFloat(2, 0, 5000),
            'status' => $this->faker->randomElement(['active', 'completed', 'pending', 'rejected']),
        ];
    }
}
