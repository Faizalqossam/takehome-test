@extends('layouts.app')

@section('content')
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('students.index') }}">List Student</a></li>
            <li class="breadcrumb-item active" aria-current="page">Student Details</li>
        </ol>
    </nav>

    <!-- Profile Header -->
    <h3>Student Details</h3>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Profile of {{ $student->firstName }} {{ $student->lastName }}</h4>
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

                    <div class="row">
                        <!-- First Name -->
                        <div class="col-md-4">
                            <strong>First Name:</strong>
                        </div>
                        <div class="col-md-8">
                            {{ $student->firstName }}
                        </div>

                        <!-- Last Name -->
                        <div class="col-md-4">
                            <strong>Last Name:</strong>
                        </div>
                        <div class="col-md-8">
                            {{ $student->lastName }}
                        </div>

                        <!-- Phone Number -->
                        <div class="col-md-4">
                            <strong>Phone Number:</strong>
                        </div>
                        <div class="col-md-8">
                            {{ $student->phoneNumber }}
                        </div>

                        <!-- Student ID -->
                        <div class="col-md-4">
                            <strong>Student ID:</strong>
                        </div>
                        <div class="col-md-8">
                            {{ $student->studentId }}
                        </div>

                        <!-- Address -->
                        <div class="col-md-4">
                            <strong>Address:</strong>
                        </div>
                        <div class="col-md-8">
                            {{ $student->address }}
                        </div>

                        <!-- Gender -->
                        <div class="col-md-4">
                            <strong>Gender:</strong>
                        </div>
                        <div class="col-md-8">
                            {{ $student->gender }}
                        </div>

                        <!-- Profile Image -->
                        <div class="col-md-4">
                            <strong>Profile Image:</strong>
                        </div>
                        <div class="col-md-8">
                            @if ($student->imageProfile)
                                <img src="{{ asset($student->imageProfile) }}" width="150" alt="Profile Image">
                            @else
                                <span>No image uploaded</span>
                            @endif
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
