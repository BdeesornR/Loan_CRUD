<?php

namespace Database\Factories;

use App\Models\Loans;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoansFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Loans::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => 1,
            'loan_amount' => 10000.00,
            'loan_term' => 1,
            'start_date' => Carbon::create(2020,05,24),
            'interest_rate' => 10,
        ];
    }

    /**
     state function
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
