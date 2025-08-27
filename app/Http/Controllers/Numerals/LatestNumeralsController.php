<?php

namespace App\Http\Controllers\Numerals;

use App\Http\Controllers\Controller;
use App\Http\Resources\LatestRomanNumeralResource;
use App\Http\Resources\RomanNumeralResource;
use App\Models\RomanNumeral;

class LatestNumeralsController extends Controller
{
    public function __invoke()
    {
        return LatestRomanNumeralResource::collection(RomanNumeral::latest()->limit(10)->get());
    }
}
