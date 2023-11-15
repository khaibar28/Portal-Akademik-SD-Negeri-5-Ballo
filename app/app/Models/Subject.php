<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';
    protected $fillable = ['subject'];

    public function score() 
    {
        return $this->hasMany(Score::class, 'subjects_id');
    }

    public function task() 
    {
        return $this->hasMany(Task::class, 'subjects_id');
    }
}
