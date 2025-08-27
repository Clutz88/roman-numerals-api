<?php

namespace App\Http\Controllers\Numerals;

use App\Http\Controllers\Controller;
use App\Http\Resources\TopRomanNumeralResource;
use Illuminate\Support\Facades\DB;

class TopNumeralsController extends Controller
{
    public function __invoke()
    {
        return TopRomanNumeralResource::collection(
            DB::table('roman_numerals')
                ->selectRaw('*, COUNT(*) as count')
                ->groupBy('number')
                ->orderBy('count', 'desc')
                ->limit(10)
                ->get()
        );
    }
}
