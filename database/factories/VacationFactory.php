<?php

namespace Database\Factories;

use App\Models\Vacation;
use Illuminate\Database\Eloquent\Factories\Factory;

class VacationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vacation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'vacation_type' => $this->faker->text(5),
            'user_id' => $this->faker->numberBetween(1,20),
            'body' => $this->faker->text(50),
            'status' => $this->faker->numberBetween(0,8),
            'Usr_date_out' => $this->faker->dateTime(),
            'Usr_date_in' => $this->faker->dateTime(),
            'description' => $this->faker->text(70)
        ];
    }
}
