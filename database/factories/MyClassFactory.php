<?php

namespace Database\Factories;

use App\Models\MyClass;
use Illuminate\Database\Eloquent\Factories\Factory;

class MyClassFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MyClass::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [            
            'code' => $this->faker->username,
            'name' => $this->faker->country,
            'maximum_students' => 10,
            'status' => $this->faker->randomElement(['opened', 'closed']),
            'description' => $this->faker->text(50)
        ];
    }
}
