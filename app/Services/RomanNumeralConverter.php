<?php

namespace App\Services;

class RomanNumeralConverter implements IntegerConverterInterface
{
    private array $numerals = [
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1,
    ];

    public function convertInteger(int $integer): string
    {
        $result = '';

        foreach ($this->numerals as $numeral => $unit) {
            while ($integer >= $unit) {
                $result .= $numeral;
                $integer -= $unit;
            }
        }

        return $result;
    }
}
