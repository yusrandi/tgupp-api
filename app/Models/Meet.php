<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meet extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function meetResults()
    {
        return $this->hasMany(MeetResult::class);
    }
    public function meetAttendances()
    {
        return $this->hasMany(MeetAttendance::class);
    }
}
