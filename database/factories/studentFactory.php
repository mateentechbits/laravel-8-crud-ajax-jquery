<?php

namespace Database\Factories;

use App\Models;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class studentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model=Student::class;
    
    public function definition()
    {
        return [
            'stdName' => $this->faker->name,
            'stdAddres'=>$this->faker->address
        ];
    }
}
