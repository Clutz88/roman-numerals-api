<?php

namespace App\Actions;

use App\Models\RomanNumeral;
use App\Services\IntegerConverterInterface;

class ConvertNumber
{
    public function __construct(private readonly IntegerConverterInterface $converter)
    {
        //
    }

    public function handle(int $number): RomanNumeral
    {
        return RomanNumeral::create([
            'number' => $number,
            'numeral' => $this->converter->convertInteger($number),
        ]);
    }
}
