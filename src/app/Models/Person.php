<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Greeting;

class Person extends Model
{
    protected $fillable = ['name'];

    public function greetings()
    {
        return $this->hasMany(Greeting::class);
    }
}
