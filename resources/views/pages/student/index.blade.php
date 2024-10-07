@extends('layouts.app')

@section('content')
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Student</li>
        </ol>
    </nav>

    <!-- Profile Header -->
    <h3>Manage Data Student</h3>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <section class="row">
        <div class="col-12">
        <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="card-title">List Student</h4>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <a href="{{ route('students.create') }}" class="btn btn-primary"><i class="bi bi-plus"></i> Add
                                Student</a>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Phone Number</th>
                                        <th>Student ID</th>
                                        <th>Address</th>
                                        <th>Gender</th>
                                        <th>Image Profile</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $student->firstName }}</td>
                                            <td>{{ $student->lastName }}</td>
                                            <td>{{ $student->phoneNumber }}</td>
                                            <td>{{ $student->studentId }}</td>
                                            <td>{{ $student->address }}</td>
                                            <td>{{ $student->gender }}</td>
                                            <td>
                                                <img src="{{ $student->imageProfile }}" alt="Profile Image" width="50">
                                            </td>
                                            <td>
                                                <div class="d-inline-flex">
                                                    <a href="{{ route('students.show', $student->id) }}"
                                                        class="btn btn-info me-1" title="Show">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                    <a href="{{ route('students.edit', $student->id) }}"
                                                        class="btn btn-warning me-1" title="Edit">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    <form action="{{ route('students.destroy', $student->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" title="Delete"
                                                            onclick="return confirm('Are you sure you want to delete this student?');">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
