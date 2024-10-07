@extends('layouts.app')

@section('content')
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('extracurricular-activities.index') }}">Data Extracurricular Activities</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ isset($activity) ? 'Edit Extracurricular Activity' : 'Add Extracurricular Activity' }}</li>
        </ol>
    </nav>

    <!-- Header -->
    <h3>{{ isset($activity) ? 'Edit Extracurricular Activity' : 'Add Extracurricular Activity' }}</h3>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ isset($activity) ? 'Update Activity Details' : 'Create New Activity' }}</h4>
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

                    <!-- Form for Creating/Updating Extracurricular Activity -->
                    <form class="form form-horizontal" method="POST"
                        action="{{ isset($activity) ? route('extracurricular-activities.update', $activity->id) : route('extracurricular-activities.store') }}">
                        @csrf
                        @if (isset($activity))
                            @method('PUT')
                        @endif

                        <div class="form-body">
                            <div class="row mx-5">

                                <!-- Name -->
                                <div class="col-md-4">
                                    <label for="name">Activity Name</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Activity Name"
                                            id="name" value="{{ old('name', $activity->name ?? '') }}" required>
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="col-md-4">
                                    <label for="status">Status</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <select name="status" id="status" class="form-control">
                                            <option value="Active" {{ old('status', $activity->status ?? '') == 'Active' ? 'selected' : '' }}>Active</option>
                                            <option value="Inactive" {{ old('status', $activity->status ?? '') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Capacity -->
                                <div class="col-md-4">
                                    <label for="capacity">Capacity</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="number" name="capacity" class="form-control" placeholder="Capacity"
                                            id="capacity" value="{{ old('capacity', $activity->capacity ?? '') }}" required>
                                    </div>
                                </div>

                                <!-- Location -->
                                <div class="col-md-4">
                                    <label for="location">Location</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="location" class="form-control" placeholder="Location"
                                            id="location" value="{{ old('location', $activity->location ?? '') }}" required>
                                    </div>
                                </div>

                                <!-- Start Date -->
                                <div class="col-md-4">
                                    <label for="start_date">Start Date</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="date" name="start_date" class="form-control" id="start_date"
                                            value="{{ old('start_date', $activity->start_date ?? '') }}" required>
                                    </div>
                                </div>

                                <!-- End Date -->
                                <div class="col-md-4">
                                    <label for="end_date">End Date</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="date" name="end_date" class="form-control" id="end_date"
                                            value="{{ old('end_date', $activity->end_date ?? '') }}" required>
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="col-md-4">
                                    <label for="description">Description</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <textarea name="description" class="form-control" id="description" rows="3"
                                            placeholder="Description of the activity">{{ old('description', $activity->description ?? '') }}</textarea>
                                    </div>
                                </div>

                                <!-- Submit and Reset Buttons -->
                                <div class="col-md-4 mt-5">
                                    <a href="{{ route('extracurricular-activities.index') }}" class="btn btn-secondary me-1 mb-1">Back</a>
                                </div>
                                <div class="col-md-8 mt-5 d-flex justify-content-end">
                                    <button type="submit"
                                        class="btn btn-primary me-1 mb-1">{{ isset($activity) ? 'Update Activity' : 'Create Activity' }}</button>
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
