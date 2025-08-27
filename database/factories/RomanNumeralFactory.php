<?php

namespace Database\Factories;

use App\Models\RomanNumeral;
use App\Services\IntegerConverterInterface;
use Illuminate\Database\Eloquent\Factories\Factory;

class RomanNumeralFactory extends Factory
{
    protected $model = RomanNumeral::class;

    public function definition(): array
    {
        $number = fake()->numberBetween(1, 3999);
        $numeral = resolve(IntegerConverterInterface::class)->convertInteger($number);
        $date = fake()->dateTimeBetween('-1 week', '+ 1 week');

        return [
            'number' => $number,
            'numeral' => $numeral,
            'created_at' => $date,
            'updated_at' => $date,
        ];
    }
}
