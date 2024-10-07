@extends('layouts.app')

@section('content')
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('extracurricular-activities.index') }}">Data Extracurricular Activities</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Extracurricular Activity</li>
        </ol>
    </nav>

    <!-- Profile Header -->
    <h3>Detail Extracurricular Activity</h3>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ $activity->name }}</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="row mx-5">

                        <!-- Name -->
                        <div class="col-md-4">
                            <strong>Activity Name:</strong>
                        </div>
                        <div class="col-md-8">
                            {{ $activity->name }}
                        </div>

                        <!-- Status -->
                        <div class="col-md-4">
                            <strong>Status:</strong>
                        </div>
                        <div class="col-md-8">
                            {{ $activity->status }}
                        </div>

                        <!-- Capacity -->
                        <div class="col-md-4">
                            <strong>Capacity:</strong>
                        </div>
                        <div class="col-md-8">
                            {{ $activity->capacity }}
                        </div>

                        <!-- Location -->
                        <div class="col-md-4">
                            <strong>Location:</strong>
                        </div>
                        <div class="col-md-8">
                            {{ $activity->location }}
                        </div>

                        <!-- Start Date -->
                        <div class="col-md-4">
                            <strong>Start Date:</strong>
                        </div>
                        <div class="col-md-8">
                            {{ \Carbon\Carbon::parse($activity->start_date)->format('d M Y') }}
                        </div>

                        <!-- End Date -->
                        <div class="col-md-4">
                            <strong>End Date:</strong>
                        </div>
                        <div class="col-md-8">
                            {{ \Carbon\Carbon::parse($activity->end_date)->format('d M Y') }}
                        </div>

                        <!-- Description -->
                        <div class="col-md-4">
                            <strong>Description:</strong>
                        </div>
                        <div class="col-md-8">
                            {{ $activity->description ?? 'No description available.' }}
                        </div>

                        <!-- Action Buttons -->
                        <div class="col-md-4 mt-5">
                            <a href="{{ route('extracurricular-activities.index') }}" class="btn btn-secondary me-1 mb-1">Back</a>
                        </div>
                        <div class="col-md-8 mt-5 d-flex justify-content-end">
                            <a href="{{ route('extracurricular-activities.edit', $activity->id) }}" class="btn btn-warning me-1 mb-1" title="Edit">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('extracurricular-activities.destroy', $activity->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this activity?');">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
