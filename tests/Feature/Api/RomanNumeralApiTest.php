<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RomanNumeralApiTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @dataProvider provideValidResults
     */
    public function testApiReturnsNumeral($numeral, $number): void
    {
        $this->postJson(route('api.numerals.convert'), ['number' => $number])
            ->assertJson(['data' => ['number' => $number, 'numeral' => $numeral]]);
    }

    /**
     * @dataProvider provideInvalidRequests
     */
    public function testReturnsErrorForInvalidRequest($number): void
    {
        $this->postJson(route('api.numerals.convert'), ['number' => $number])
            ->assertStatus(422);
    }

    public static function provideValidResults(): array
    {
        return [
            ['I', 1,],
            ['IV', 4,],
            ['V', 5,],
            ['IX', 9,],
            ['X', 10,],
            ['C', 100,],
            ['XL', 40,],
            ['L', 50,],
            ['XC', 90,],
            ['CD', 400,],
            ['D', 500,],
            ['CM', 900,],
            ['M', 1000,],
            ['MMMCMXCIX', 3999],
            ['MMXVI', 2016],
            ['MMXVIII', 2018],
        ];
    }

    public static function provideInvalidRequests(): array
    {
        return [
            'Negative number' => [-1],
            'Zero' => [0],
            'Too high number' => [99999]
        ];
    }
}
