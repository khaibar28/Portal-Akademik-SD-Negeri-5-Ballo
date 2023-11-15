<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $table = 'scores';
    protected $fillable = [
        'user_id',
        'task_score',
        'UH',
        'UAS',
        'subjects_id',
        'classess_id',
        'school_years_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subjects_id');
    }

    public function classes()
    {
        return $this->belongsTo(Classes::class, 'classess_id');
    }

    public function schoolYear()
    {
        return $this->belongsTo(SchoolYear::class, 'school_years_id');
    }
}
