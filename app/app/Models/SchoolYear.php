<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    use HasFactory;
    
    protected $table = 'school_years';
    protected $fillable = ['school_year'];

    public function score() 
    {
        return $this->hasMany(Score::class, 'school_years_id');
    }
}
