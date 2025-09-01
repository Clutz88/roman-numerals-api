<?php

namespace App\Http\Controllers\Numerals;

use App\Http\Controllers\Controller;
use App\Http\Resources\LatestRomanNumeralResource;
use App\Models\RomanNumeral;

class LatestNumeralsController extends Controller
{
    public function __invoke()
    {
        return LatestRomanNumeralResource::collection(RomanNumeral::latest('id')->limit(10)->get());
    }
}
