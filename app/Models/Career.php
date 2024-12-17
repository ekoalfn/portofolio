<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;
    protected  $guarded = [];

    public function positions()
    {
        return $this->belongsToMany(Position::class, 'position_careers','career_id','position_id');
    }
}
