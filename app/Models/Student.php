<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public function getImageAttribute()
    {
        return 'data/dashboard/students';
    }
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
    public function groups()
    {
        return $this->hasMany(Group::class);
    }
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}