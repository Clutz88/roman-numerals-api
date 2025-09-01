<?php

namespace App\Http\Controllers\Numerals;

use App\Http\Controllers\Controller;
use App\Http\Resources\TopRomanNumeralResource;
use App\Models\RomanNumeral;
use Dedoc\Scramble\Attributes\Group;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

#[Group('Roman Numerals')]
class TopNumeralsController extends Controller
{
    /**
     * Top Numerals
     *
     * Return top most converted numbers to roman numerals, defaults to top ten.
     */
    public function __invoke(Request $request): JsonResource
    {
        return TopRomanNumeralResource::collection(
            RomanNumeral::topRequests()
                ->limit(10)
                ->get()
        );
    }
}
