<?php

namespace Tests\Feature\Api;

use App\Models\RomanNumeral;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TopRomanNumeralsTest extends TestCase
{
    use RefreshDatabase;

    public function testReturnsTopRomanNumerals()
    {
        $this->givenTopTen();

        $this->get(route('api.numerals.top'))
            ->assertStatus(200)
            ->assertJsonFragment(['data' => [
                ['number' => 10, 'numeral' => 'X', 'count' => 12],
                ['number' => 888, 'numeral' => 'DCCCLXXXVIII', 'count' => 11],
                ['number' => 2024, 'numeral' => 'MMXXIV', 'count' => 10],
                ['number' => 350, 'numeral' => 'CCCL', 'count' => 9],
                ['number' => 100, 'numeral' => 'C', 'count' => 8],
                ['number' => 50, 'numeral' => 'L', 'count' => 7],
                ['number' => 1999, 'numeral' => 'MCMXCIX', 'count' => 6],
                ['number' => 1000, 'numeral' => 'M', 'count' => 5],
                ['number' => 500, 'numeral' => 'D', 'count' => 4],
                ['number' => 5, 'numeral' => 'V', 'count' => 3],
            ]]);

    }

    private function givenTopTen(): void
    {
        RomanNumeral::factory(3)->create(['number' => 5, 'numeral' => 'V']);
        RomanNumeral::factory(12)->create(['number' => 10, 'numeral' => 'X']);
        RomanNumeral::factory(7)->create(['number' => 50, 'numeral' => 'L']);
        RomanNumeral::factory(8)->create(['number' => 100, 'numeral' => 'C']);
        RomanNumeral::factory(4)->create(['number' => 500, 'numeral' => 'D']);
        RomanNumeral::factory(5)->create(['number' => 1000, 'numeral' => 'M']);
        RomanNumeral::factory(6)->create(['number' => 1999, 'numeral' => 'MCMXCIX']);
        RomanNumeral::factory(10)->create(['number' => 2024, 'numeral' => 'MMXXIV']);
        RomanNumeral::factory(9)->create(['number' => 350, 'numeral' => 'CCCL']);
        RomanNumeral::factory(11)->create(['number' => 888, 'numeral' => 'DCCCLXXXVIII']);

        // Numerals that don't make the top ten, so we shouldn't see them
        RomanNumeral::factory(1)->create(['number' => 44, 'numeral' => 'XLIV']);
        RomanNumeral::factory(2)->create(['number' => 99, 'numeral' => 'XCIX']);
        RomanNumeral::factory(2)->create(['number' => 2500, 'numeral' => 'MMD']);
    }

}
