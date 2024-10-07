<?php

namespace App\Http\Controllers;

use App\Models\StudentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = StudentModel::orderBy('created_at', 'desc')->get();

        return view('pages.student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.student.edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'nullable|string|max:255',
            'phoneNumber' => 'nullable|string|max:15',
            'studentId' => 'required|string|max:20|unique:students,studentId',
            'address' => 'nullable|string|max:255',
            'gender' => 'required|in:Male,Female',
            'imageProfile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('imageProfile')) {
            $imageName = time() . '.' . $request->imageProfile->extension();
            $request->imageProfile->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName;
        } else {
            $imagePath = null;
        }

        StudentModel::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'phoneNumber' => $request->phoneNumber,
            'studentId' => $request->studentId,
            'address' => $request->address,
            'gender' => $request->gender,
            'imageProfile' => $imagePath,
        ]);

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $student = StudentModel::findOrFail($id);

        return view('pages.student.details', compact('student'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = StudentModel::findOrFail($id);

        return view('pages.student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'nullable|string|max:255',
            'phoneNumber' => 'nullable|integer',
            'studentId' => 'required|string',
            'address' => 'nullable|string',
            'gender' => 'required|string',
            'imageProfile' => 'image|nullable|max:2048', 
        ]);

        $student = StudentModel::findOrFail($id);
        $student->firstName = $request->firstName;
        $student->lastName = $request->lastName;
        $student->phoneNumber = $request->phoneNumber;
        $student->studentId = $request->studentId;
        $student->address = $request->address;
        $student->gender = $request->gender;

        if ($request->hasFile('imageProfile')) {
            $imageName = time() . '.' . $request->imageProfile->extension();
            $request->imageProfile->move(public_path('images'), $imageName);
            $student->imageProfile = 'images/' . $imageName; 
        }

        $student->save();

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        // Delete the student record
        $student = StudentModel::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');

    }
}
