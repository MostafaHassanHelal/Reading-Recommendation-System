<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'unique_intervals_list', 'read_pages_count'];

    public function getUniqueIntervalsListAttribute()
    { 
        return json_decode($this->attributes['unique_intervals_list'], true);
    }
}
