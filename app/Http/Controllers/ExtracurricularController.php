<?php

namespace App\Http\Controllers;

use App\Models\ExtracurricularModel;
use Illuminate\Http\Request;

class ExtracurricularController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = ExtracurricularModel::orderBy('created_at', 'desc')->get();

        return view('pages.extracurricular.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.extracurricular.edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
                    'name' => 'required|string|max:255',
                    'description' => 'nullable|string',
                    'start_date' => 'nullable|date',
                    'end_date' => 'nullable|date|after_or_equal:start_date',
                    'location' => 'nullable|string|max:255',
                    'capacity' => 'nullable|integer',
                    'status' => 'required|string|max:20',
                ]);

        ExtracurricularModel::create($request->all());

        return redirect()->route('extracurricular-activities.index')->with('success', 'Activity created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $activity = ExtracurricularModel::find($id);
        return view('pages.extracurricular.details', compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $activity = ExtracurricularModel::find($id);
        return view('pages.extracurricular.edit', compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
                    'name' => 'required|string|max:255',
                    'description' => 'nullable|string',
                    'start_date' => 'nullable|date',
                    'end_date' => 'nullable|date|after_or_equal:start_date',
                    'location' => 'nullable|string|max:255',
                    'capacity' => 'nullable|integer',
                    'status' => 'required|string|max:20',
                ]);
        $activitiy = ExtracurricularModel::findOrFail($id);
        $activitiy->update($request->all());

        return redirect()->route('extracurricular-activities.index')->with('success', 'Activity updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $activitiy = ExtracurricularModel::findOrFail($id);
        $activitiy->delete();

        return redirect()->route('extracurricular-activities.index')->with('success', 'Activity deleted successfully.');
    }
}
