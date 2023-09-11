<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referee extends Model
{
    use HasFactory;

    protected $fillable = [
    'name', 
    'email', 
    'password'
];

    protected $hidden = ['password'];

    public function rounds()
    {
        return $this->hasMany(Round::class);
    }
}
