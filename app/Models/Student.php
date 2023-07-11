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
        return $this->belongsToMany(Group::class, 'student_groups', 'student_id', 'group_id');
    }
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}