<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentExtracurricularModel extends Model
{
    use HasFactory;

    protected $table = 'extracurricular_student';

    protected $fillable = [
        'student_id',
        'extracurricular_activity_id',
        'join_date',
    ];

    public function student()
    {
        return $this->belongsTo(StudentModel::class);
    }

    public function extracurricularActivity()
    {
        return $this->belongsTo(ExtracurricularModel::class);
    }
}
