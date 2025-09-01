<?php

namespace Tests\Feature\Commands;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ConvertNumeralCommandTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @dataProvider provideValidResults
     */
    public function testConvertsNumberToNumeral(string $expected, int $number)
    {
        $result = $this->artisan('convert:number', ['number' => $number]);

        $result->assertOk()
            ->expectsOutput($expected);
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
}
