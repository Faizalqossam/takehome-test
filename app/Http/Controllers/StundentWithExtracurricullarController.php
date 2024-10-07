<?php

namespace App\Http\Controllers;

use App\Models\ExtracurricularModel;
use App\Models\StudentExtracurricularModel;
use App\Models\StudentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StundentWithExtracurricullarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $enrollments = DB::table('extracurricular_student')
            ->join('students', 'extracurricular_student.student_id', '=', 'students.id')
            ->join('extracurricular_activities', 'extracurricular_student.extracurricular_activity_id', '=', 'extracurricular_activities.id')
            ->select(
                'extracurricular_student.id as id',
                'students.firstName as student_first_name',
                'students.lastName as student_last_name',
                'extracurricular_activities.name as activity_name',
                'extracurricular_student.join_date'
            )
            ->get();

        return view('pages.student-extracurricular.index', compact('enrollments'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = StudentModel::all();
        $activities = ExtracurricularModel::all();
        return view('pages.student-extracurricular.edit', compact('students', 'activities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'extracurricular_activity_id' => 'required|exists:extracurricular_activities,id',
            'join_date' => 'required|date',
        ]);

        StudentExtracurricularModel::create([
            'student_id' => $request->student_id,
            'extracurricular_activity_id' => $request->extracurricular_activity_id,
            'join_date' => $request->join_date,
        ]);

        return redirect()->route('enrollment-activities.index')->with('success', 'Enrollment created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $enrollment = StudentExtracurricularModel::with(['student', 'extracurricularActivity'])
                    ->findOrFail($id);

        return view('pages.student-extracurricular.details', compact('enrollment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $enrollment = DB::table('extracurricular_student')
                ->join('students', 'extracurricular_student.student_id', '=', 'students.id')
                ->join('extracurricular_activities', 'extracurricular_student.extracurricular_activity_id', '=', 'extracurricular_activities.id')
                ->select(
                    'extracurricular_student.id as id',
                    'extracurricular_student.student_id',
                    'extracurricular_student.extracurricular_activity_id',
                    'extracurricular_student.join_date',
                    'students.firstName as student_first_name',
                    'students.lastName as student_last_name',
                    'extracurricular_activities.name as activity_name'
                )
                ->where('extracurricular_student.id', $id)
                ->first();

        $students = StudentModel::all();
        $activities = ExtracurricularModel::all();

        return view('pages.student-extracurricular.edit', compact('enrollment', 'students', 'activities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'extracurricular_activity_id' => 'required|exists:extracurricular_activities,id',
            'join_date' => 'required|date',
        ]);

        $enrollment = StudentExtracurricularModel::findOrFail($id);
        $enrollment->update([
            'student_id' => $request->student_id,
            'extracurricular_activity_id' => $request->extracurricular_activity_id,
            'join_date' => $request->join_date,
        ]);

        return redirect()->route('enrollment-activities.index')->with('success', 'Enrollment updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $enrollment = StudentExtracurricularModel::findOrFail($id);
        $enrollment->delete();

        return redirect()->route('enrollment-activities.index')->with('success', 'Enrollment deleted successfully!');

    }
}
