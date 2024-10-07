@extends('layouts.app')

@section('content')
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
        </ol>
    </nav>

    <!-- Profile Header -->
    <h3>Profile</h3>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit & Update Profile Admin</h4>
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

                    {{-- Display validation errors --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="form form-horizontal" method="POST" action="{{ route('update.profile') }}">
                        @csrf
                        @method('PUT')

                        <div class="form-body">
                            <div class="row mx-5">

                                <!-- First Name Field -->
                                <div class="col-md-4">
                                    <label for="first-name-horizontal-icon">First Name</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" name="firstName" class="form-control"
                                                placeholder="First Name" id="firstName"
                                                value="{{ old('firstName', $admin->firstName) }}" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Last Name Field -->
                                <div class="col-md-4">
                                    <label for="last-name-horizontal-icon">Last Name</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" name="lastName" class="form-control"
                                                placeholder="Last Name" id="lastName"
                                                value="{{ old('lastName', $admin->lastName) }}">
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Email Field -->
                                <div class="col-md-4">
                                    <label for="email-horizontal-icon">Email</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="email" name="email" class="form-control" placeholder="Email"
                                                id="email" value="{{ old('email', $admin->email) }}" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-envelope"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Birthdate Field -->
                                <div class="col-md-4">
                                    <label for="birthdate-horizontal-icon">Birthdate</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="date" name="birthdate" class="form-control"
                                                placeholder="Birthdate" id="birthdate"
                                                value="{{ old('birthdate', $admin->birthdate) }}">
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Gender Field -->
                                <div class="col-md-4">
                                    <label for="gender-horizontal-icon">Gender</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="Male" {{ $admin->gender == 'Male' ? 'selected' : '' }}>Male
                                                </option>
                                                <option value="Female" {{ $admin->gender == 'Female' ? 'selected' : '' }}>
                                                    Female</option>
                                            </select>
                                            <div class="form-control-icon">
                                                <i class="bi bi-gender-ambiguous"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Password Field (Leave blank if not updating) -->
                                <div class="col-md-4">
                                    <label for="password-horizontal-icon">Password</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Password" id="password">
                                            <div class="form-control-icon">
                                                <i class="bi bi-lock"></i>
                                            </div>
                                            <small class="form-text text-muted">Leave blank if you don't want to change the
                                                password.</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="password-confirmation-horizontal-icon">Confirm Password</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="password" name="password_confirmation" class="form-control"
                                                placeholder="Confirm Password" id="password_confirmation">
                                            <div class="form-control-icon">
                                                <i class="bi bi-lock"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit and Reset Buttons -->
                                <div class="col-md-4 mt-5">
                                    <a href="{{ route('dashboard') }}" class="btn btn-secondary me-1 mb-1">Back</a>
                                </div>
                                <div class="col-md-8 mt-5 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Update Profile</button>
                                    <button type="button" id="resetButton" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#resetButton').click(function() {
                // Clear all input fields
                $('#firstName').val('');
                $('#lastName').val('');
                $('#email').val('');
                $('#birthdate').val('');
                $('#gender').val('');
                $('#password').val('');
            });
        });
    </script>
@endsection

