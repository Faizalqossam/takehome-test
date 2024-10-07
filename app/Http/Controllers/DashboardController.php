<?php

namespace App\Http\Controllers;

use App\Models\ExtracurricularModel;
use App\Models\StudentModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStudents = StudentModel::count();
        $totalExtracurriculars = ExtracurricularModel::count();
        $totalStudentsWithExtracurricular = StudentModel::whereHas('extracurricularActivities')->count(); // Assuming a relationship exists
        $totalAdmins = User::count();

        return view('pages.dashboard.index' ,compact('totalStudents', 'totalExtracurriculars', 'totalStudentsWithExtracurricular', 'totalAdmins'));
    }

    public function editProfile()
    {
        $admin = Auth::user();

        return view('pages.dashboard.profile', compact('admin'));
    }

    public function updateProfile(Request $request)
    {

        $admin = Auth::user();

        // Validate the request data
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'nullable|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $admin->id,
            'birthdate' => 'nullable|date',
            'gender' => 'required|in:Male,Female',
            'password' => 'nullable|min:8|confirmed', 
        ]);

        // Update the admin's profile
        $admin->firstName = $request->input('firstName');
        $admin->lastName = $request->input('lastName');
        $admin->email = $request->input('email');
        $admin->birthdate = $request->input('birthdate');
        $admin->gender = $request->input('gender');

        if ($request->filled('password')) {
            $admin->password = Hash::make($request->input('password'));
        }

        $admin->save();

        // Redirect with success message
        return redirect()->back()->with('success', 'Profile updated successfully!');

    }
}
