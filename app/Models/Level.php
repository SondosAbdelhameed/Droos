<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function groups()
    {
        return $this->hasMany(Group::class);
    }
    public function monthlyLevelPrices()
    {
        return $this->hasMany(MonthlyLevelPrice::class);
    }
}