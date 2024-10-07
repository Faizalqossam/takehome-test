@extends('layouts.app')

@section('content')
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Extracurricular Enrollments</li>
        </ol>
    </nav>

    <h3>Manage Extracurricular Enrollments</h3>

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
                            <h4 class="card-title">List of Extracurricular Enrollments</h4>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <a href="{{ route('enrollment-activities.create') }}" class="btn btn-primary">
                                <i class="bi bi-plus"></i> Add Enrollment
                            </a>
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
                                        <th>Student Name</th>
                                        <th>Activity Name</th>
                                        <th>Join Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($enrollments as $enrollment)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $enrollment->student_first_name }} {{ $enrollment->student_last_name }}</td>
                                            <td>{{ $enrollment->activity_name }}</td>
                                            <td>{{ \Carbon\Carbon::parse($enrollment->join_date)->format('Y-m-d') }}</td>
                                            <td>
                                                <div class="d-inline-flex">
                                                    <a href="{{ route('enrollment-activities.show', $enrollment->id) }}" class="btn btn-info me-1" title="Show">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                    <a href="{{ route('enrollment-activities.edit', $enrollment->id) }}" class="btn btn-warning me-1" title="Edit">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    <form action="{{ route('enrollment-activities.destroy', $enrollment->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this enrollment?');">
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
