<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class StudentModel extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'firstName',
        'lastName',
        'phoneNumber',
        'studentId',
        'address',
        'gender',
        'imageProfile',
        'created_at',
        'updated_at',
    ];

    public function extracurricularActivities(): BelongsToMany
    {
        return $this->belongsToMany(ExtracurricularModel::class, 'extracurricular_student', 'student_id', 'extracurricular_activity_id');
    }
}
