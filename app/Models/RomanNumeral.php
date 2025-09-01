<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class RomanNumeral extends Model
{
    use HasFactory;

    protected $fillable = ['number', 'numeral'];

    public function scopeTopRequests(Builder $query): Builder
    {
        return $query->select(['*', DB::raw('count(*) as count')])
            ->groupBy(['numeral'])
            ->orderBy('count', 'desc');
    }
}
