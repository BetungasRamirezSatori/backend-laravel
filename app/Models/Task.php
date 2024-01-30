<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function steps()
    {
        return $this->hasMany(Step::class); 
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function todo()
    {
        return $this->belongsTo(Todo::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->using(TaskUser::class);            
    }
}
