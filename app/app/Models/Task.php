<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';
    protected $fillable = [
        'task_description',
        'deadline',
        'subjects_id',
        'classess_id',
        'school_years_id'
    ];

    protected $dates = ['deadline'];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subjects_id');
    }

    public function classes()
    {
        return $this->belongsTo(Classes::class, 'classess_id');
    }
}






