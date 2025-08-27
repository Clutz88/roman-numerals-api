<?php

namespace App\Http\Controllers\Numerals;

use App\Actions\ConvertNumber;
use App\Http\Controllers\Controller;
use App\Http\Requests\RomanNumeralRequest;
use App\Http\Resources\RomanNumeralResource;

class ConvertNumberController extends Controller
{
    public function __construct(private readonly ConvertNumber $converter)
    {
        //
    }

    public function __invoke(RomanNumeralRequest $request)
    {
        $number = $request->validated('number');

        return RomanNumeralResource::make($this->converter->handle($number));
    }
}
