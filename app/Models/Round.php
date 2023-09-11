<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
    use HasFactory;


    protected $fillable = ['round_number'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function referees()
    {
        return $this->hasMany(Referee::class);
    }

    public function scores()
    {
        return $this->hasMany(Score::class);
    }
}
