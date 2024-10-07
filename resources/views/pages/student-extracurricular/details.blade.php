@extends('layouts.app')

@section('content')
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('enrollment-activities.index') }}">Enrollment List</a></li>
            <li class="breadcrumb-item active" aria-current="page">Enrollment Details</li>
        </ol>
    </nav>

    <h3>Enrollment Details</h3>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Details for {{ $enrollment->student->firstName }} {{ $enrollment->student->lastName }}</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <p><strong>Activity:</strong> {{ $enrollment->extracurricularActivity->name }}</p>
                <p><strong>Join Date:</strong> {{ $enrollment->join_date }}</p>
                <a href="{{ route('enrollment-activities.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
@endsection
