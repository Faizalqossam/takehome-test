@extends('layouts.app')
{{-- @dd($student) --}}
@section('content')
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('students.index') }}">Data Student</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ isset($student) ? 'Edit Student' : 'Add Student' }}</li>
        </ol>
    </nav>

    <!-- Header -->
    <h3>{{ isset($student) ? 'Edit Student' : 'Add Student' }}</h3>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ isset($student) ? 'Update Student Details' : 'Create New Student' }}</h4>
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

                    <!-- Form for Creating/Updating Student -->
                    <form class="form form-horizontal" method="POST"
                        action="{{ isset($student) ? route('students.update', $student->id) : route('students.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @if (isset($student))
                            @method('PUT')
                        @endif

                        <div class="form-body">
                            <div class="row mx-5">

                                <!-- First Name -->
                                <div class="col-md-4">
                                    <label for="firstName">First Name</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="firstName" class="form-control" placeholder="First Name"
                                            id="firstName" value="{{ old('firstName', $student->firstName ?? '') }}"
                                            required>
                                    </div>
                                </div>

                                <!-- Last Name -->
                                <div class="col-md-4">
                                    <label for="lastName">Last Name</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="lastName" class="form-control" placeholder="Last Name"
                                            id="lastName" value="{{ old('lastName', $student->lastName ?? '') }}">
                                    </div>
                                </div>

                                <!-- Phone Number -->
                                <div class="col-md-4">
                                    <label for="phoneNumber">Phone Number</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="phoneNumber" class="form-control"
                                            placeholder="Phone Number" id="phoneNumber"
                                            value="{{ old('phoneNumber', $student->phoneNumber ?? '') }}">
                                    </div>
                                </div>

                                <!-- Student ID -->
                                <div class="col-md-4">
                                    <label for="studentId">Student ID</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="studentId" class="form-control" placeholder="Student ID"
                                            id="studentId" value="{{ old('studentId', $student->studentId ?? '') }}"
                                            required>
                                    </div>
                                </div>

                                <!-- Address -->
                                <div class="col-md-4">
                                    <label for="address">Address</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <textarea name="address" class="form-control" id="address" rows="3">{{ old('address', $student->address ?? '') }}</textarea>
                                    </div>
                                </div>

                                <!-- Gender -->
                                <div class="col-md-4">
                                    <label for="gender">Gender</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="Male"
                                                {{ old('gender', $student->gender ?? '') == 'Male' ? 'selected' : '' }}>
                                                Male</option>
                                            <option value="Female"
                                                {{ old('gender', $student->gender ?? '') == 'Female' ? 'selected' : '' }}>
                                                Female</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Profile Image -->
                                <div class="col-md-4">
                                    <label for="imageProfile">Profile Image</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="file" name="imageProfile" id="imageProfile" class="form-control">
                                        @if (isset($student->imageProfile))
                                        <div class="mt-3">
                                            <small>Current Image : 
                                                <img src="{{ asset($student->imageProfile) }}" width="15%" alt="Profile Image">
                                            </small>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Submit and Reset Buttons -->
                                <div class="col-md-4 mt-5">
                                    <a href="{{ route('students.index') }}" class="btn btn-secondary me-1 mb-1">Back</a>
                                </div>
                                <div class="col-md-8 mt-5 d-flex justify-content-end">
                                    <button type="submit"
                                        class="btn btn-primary me-1 mb-1">{{ isset($student) ? 'Update Student' : 'Create Student' }}</button>
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
