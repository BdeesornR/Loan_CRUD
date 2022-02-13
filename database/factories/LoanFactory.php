<?php

namespace Database\Factories;

use App\Models\Loan;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Loan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'loan_amount' => $this->faker->numberBetween(1, 100) * 10000,
            'loan_term' => $this->faker->numberBetween(1, 3),
            'start_date' => $this->faker->date(config('loan.date_format.default')),
            'interest_rate' => $this->faker->numberBetween(1, 100),
        ];
    }

    /**
    * state function
    **/
    public function suspended()
    {
        return $this->state(function (array $attributes) {
            return [
                'interest_rate' => 50,
            ];
        });
    }
}
