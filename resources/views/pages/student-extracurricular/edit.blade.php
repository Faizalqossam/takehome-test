@extends('layouts.app')

@section('content')
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('enrollment-activities.index') }}">Extracurricular Enrollments</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Enrollment</li>
        </ol>
    </nav>

    <h3>Edit Extracurricular Enrollment</h3>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ isset($enrollment) ? 'Update Enrollment Details' : 'Create Enrollment' }}</h4>
            </div>
            <div class="card-content">
                <div class="card-body">

                    <!-- Success Alert -->
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Validation Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Form for Editing or Creating Enrollment -->
                    <form method="POST" 
                          action="{{ isset($enrollment) ? route('enrollment-activities.update', $enrollment->id) : route('enrollment-activities.store') }}">
                        @csrf
                        @if (isset($enrollment))
                            @method('PUT')
                        @endif

                        <div class="form-body">
                            <div class="row mx-5">

                                <!-- Student Selection -->
                                <div class="col-md-4">
                                    <label for="student_id">Student</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <select name="student_id" id="student_id" class="form-control" required>
                                            <option value="" disabled {{ !isset($enrollment) ? 'selected' : '' }}>Select a student</option>
                                            @foreach($students as $student)
                                                <option value="{{ $student->id }}" {{ (isset($enrollment) && $enrollment->student_id == $student->id) ? 'selected' : '' }}>
                                                    {{ $student->firstName }} {{ $student->lastName }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Extracurricular Activity Selection -->
                                <div class="col-md-4">
                                    <label for="extracurricular_activity_id">Extracurricular Activity</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <select name="extracurricular_activity_id" id="extracurricular_activity_id" class="form-control" required>
                                            <option value="" disabled {{ !isset($enrollment) ? 'selected' : '' }}>Select an activity</option>
                                            @foreach($activities as $activity)
                                                <option value="{{ $activity->id }}" {{ (isset($enrollment) && $enrollment->extracurricular_activity_id == $activity->id) ? 'selected' : '' }}>
                                                    {{ $activity->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Join Date -->
                                <div class="col-md-4">
                                    <label for="join_date">Join Date</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="date" name="join_date" id="join_date" class="form-control" value="{{ old('join_date', isset($enrollment) ? $enrollment->join_date : '') }}" required>
                                    </div>
                                </div>

                                <!-- Submit and Reset Buttons -->
                                <div class="col-md-4 mt-5">
                                    <a href="{{ route('enrollment-activities.index') }}" class="btn btn-secondary me-1 mb-1">Back</a>
                                </div>
                                <div class="col-md-8 mt-5 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">{{ isset($enrollment) ? 'Update Enrollment' : 'Create Enrollment' }}</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
