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
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}