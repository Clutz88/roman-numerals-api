<?php

namespace App\Http\Resources;

use App\Models\RomanNumeral;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin RomanNumeral */
class RomanNumeralResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'number' => $this->number,
            'numeral' => $this->numeral,
        ];
    }
}
