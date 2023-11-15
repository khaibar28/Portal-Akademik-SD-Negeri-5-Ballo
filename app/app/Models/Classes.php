<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
    protected $table = 'classess';
    protected $fillable = ['grade'];

    public function score() 
    {
        return $this->hasMany(Score::class, 'classess_id');
    }

    public function task() 
    {
        return $this->hasMany(Task::class, 'classess_id');
    }
}
