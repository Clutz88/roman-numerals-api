<?php

namespace App\Http\Controllers\Numerals;

use App\Http\Controllers\Controller;
use App\Http\Resources\LatestRomanNumeralResource;
use App\Models\RomanNumeral;
use Dedoc\Scramble\Attributes\Group;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

#[Group('Roman Numerals')]
class LatestNumeralsController extends Controller
{
    /**
     * Latest Numerals
     *
     * This endpoint outputs a list of the latest converted numerals, from both the endpoint and the artisan command.
     *
     * The conversions are not deduped, causing duplication requests to show as duplicates in this list.
     */
    public function __invoke(Request $request): JsonResource
    {
        return LatestRomanNumeralResource::collection(RomanNumeral::latest('id')->limit(10)->get());
    }
}
