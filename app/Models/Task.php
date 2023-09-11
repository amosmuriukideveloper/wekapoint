<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;


    protected $fillable = [
    'task_name', 
    'description'
];

    public function round()
    {
        return $this->belongsTo(Round::class);
    }

    public function scores()
    {
        return $this->hasMany(Score::class);
    }
}
