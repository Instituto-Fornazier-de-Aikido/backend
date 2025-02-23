<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Modules\Dojo\Infrastructure\Model\Dojo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class DojoFactory extends Factory
{
    protected $model = Dojo::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'street' => $this->faker->streetName(),
            'number' => $this->faker->word(),
            'neighborhood' => $this->faker->word(),
            'city' => $this->faker->city(),
            'state' => $this->faker->word(),
            'zipCode' => $this->faker->postcode(),
            'complement' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
