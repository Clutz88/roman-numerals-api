<?php

namespace App\Http\Controllers\Numerals;

use App\Http\Controllers\Controller;
use App\Http\Resources\TopRomanNumeralResource;
use App\Models\RomanNumeral;
use Illuminate\Support\Facades\DB;

class TopNumeralsController extends Controller
{
    public function __invoke()
    {
        return TopRomanNumeralResource::collection(
            RomanNumeral::topRequests()
                ->limit(10)
                ->get()
        );
    }
}
