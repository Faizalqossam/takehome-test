<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ExtracurricularModel extends Model
{
    use HasFactory;

    protected $table = 'extracurricular_activities';

    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'location',
        'capacity',
        'status',
        'created_at',
        'updated_at'
    ];

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(StudentModel::class, 'extracurricular_student', 'extracurricular_activity_id', 'student_id');
    }
}
