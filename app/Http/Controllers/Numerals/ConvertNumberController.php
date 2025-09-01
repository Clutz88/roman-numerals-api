<?php

namespace App\Http\Controllers\Numerals;

use App\Actions\ConvertNumber;
use App\Http\Controllers\Controller;
use App\Http\Requests\RomanNumeralRequest;
use App\Http\Resources\RomanNumeralResource;
use Dedoc\Scramble\Attributes\Group;
use Illuminate\Http\Resources\Json\JsonResource;

#[Group('Roman Numerals')]
class ConvertNumberController extends Controller
{
    public function __construct(private readonly ConvertNumber $converter)
    {
        //
    }

    /**
     * Convert To Roman Numeral
     *
     * Given an input number, this endpoint will convert it to its roman numeral and return the result.
     *
     * Validation on the input is it must be a number and between 1 and 3999
     */
    public function __invoke(RomanNumeralRequest $request): JsonResource
    {
        $number = $request->validated('number');

        return RomanNumeralResource::make($this->converter->handle($number));
    }
}
