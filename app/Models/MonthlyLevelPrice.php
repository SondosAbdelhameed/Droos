<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyLevelPrice extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [ 'start_date'=>'date', 'end_date'=>'date'];
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}