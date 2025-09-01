<?php

namespace Tests\Feature\Api;

use App\Models\RomanNumeral;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LatestRomanNumeralsTest extends TestCase
{
    use RefreshDatabase;

    public function testReturnsLatestRomanNumerals()
    {
        $created_at = Carbon::now();
        $this->givenLatestNumerals($created_at);

        $this->get(route('api.numerals.latest'))
            ->assertStatus(200)
            ->assertExactJson(['data' => [
                ['number' => 2500, 'numeral' => 'MMD', 'created_at' => $created_at->format('c')],
                ['number' => 99, 'numeral' => 'XCIX', 'created_at' => $created_at->format('c')],
                ['number' => 44, 'numeral' => 'XLIV', 'created_at' => $created_at->format('c')],
                ['number' => 888, 'numeral' => 'DCCCLXXXVIII', 'created_at' => $created_at->format('c')],
                ['number' => 350, 'numeral' => 'CCCL', 'created_at' => $created_at->format('c')],
                ['number' => 2024, 'numeral' => 'MMXXIV', 'created_at' => $created_at->format('c')],
                ['number' => 1999, 'numeral' => 'MCMXCIX', 'created_at' => $created_at->format('c')],
                ['number' => 1000, 'numeral' => 'M', 'created_at' => $created_at->format('c')],
                ['number' => 500, 'numeral' => 'D', 'created_at' => $created_at->format('c')],
                ['number' => 100, 'numeral' => 'C', 'created_at' => $created_at->format('c')],
            ]]);

    }

    private function givenLatestNumerals(Carbon $created_at): void
    {
        RomanNumeral::insert([
            // Too old, so we shouldn't see them
            ['number' => 5, 'numeral' => 'V', 'created_at' => $created_at],
            ['number' => 10, 'numeral' => 'X', 'created_at' => $created_at],
            ['number' => 50, 'numeral' => 'L', 'created_at' => $created_at],

            ['number' => 100, 'numeral' => 'C', 'created_at' => $created_at],
            ['number' => 500, 'numeral' => 'D', 'created_at' => $created_at],
            ['number' => 1000, 'numeral' => 'M', 'created_at' => $created_at],
            ['number' => 1999, 'numeral' => 'MCMXCIX', 'created_at' => $created_at],
            ['number' => 2024, 'numeral' => 'MMXXIV', 'created_at' => $created_at],
            ['number' => 350, 'numeral' => 'CCCL', 'created_at' => $created_at],
            ['number' => 888, 'numeral' => 'DCCCLXXXVIII', 'created_at' => $created_at],
            ['number' => 44, 'numeral' => 'XLIV', 'created_at' => $created_at],
            ['number' => 99, 'numeral' => 'XCIX', 'created_at' => $created_at],
            ['number' => 2500, 'numeral' => 'MMD', 'created_at' => $created_at],
        ]);
    }

}
