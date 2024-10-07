@extends('layouts.app')

@section('content')
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Extracurricular Activities</li>
        </ol>
    </nav>

    <!-- Profile Header -->
    <h3>Manage Data Extracurricular Activities</h3>

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
                            <h4 class="card-title">List of Extracurricular Activities</h4>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <a href="{{ route('extracurricular-activities.create') }}" class="btn btn-primary"><i
                                    class="bi bi-plus"></i> Add Extracurricular Activity</a>
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
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Capacity</th>
                                        <th>Location</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($activities as $activity)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $activity->name }}</td>
                                            <td>{{ $activity->status }}</td>
                                            <td>{{ $activity->capacity }}</td>
                                            <td>{{ $activity->location }}</td>
                                            <td>{{ \Carbon\Carbon::parse($activity->start_date)->format('d/m/Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($activity->end_date)->format('d/m/Y') }}</td>
                                            <td>
                                                <div class="d-inline-flex">
                                                    <a href="{{ route('extracurricular-activities.show', $activity->id) }}"
                                                        class="btn btn-info me-1" title="Show">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                    <a href="{{ route('extracurricular-activities.edit', $activity->id) }}"
                                                        class="btn btn-warning me-1" title="Edit">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    <form
                                                        action="{{ route('extracurricular-activities.destroy', $activity->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger" title="Delete"
                                                            onclick="return confirm('Are you sure you want to delete this extracurricular activity?');">
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
