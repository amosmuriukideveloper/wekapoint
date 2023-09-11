<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;
    

    protected $fillable = ['score'];

    public function round()
    {
        return $this->belongsTo(Round::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
