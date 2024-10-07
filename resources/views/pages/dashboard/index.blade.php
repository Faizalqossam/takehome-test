@extends('layouts.app')

@section('content')
<section class="row">
    <h3>Dashboard</h3>
    <p class="text-subtitle text-muted">Welcome, {{ auth()->user()->firstName }}!</p>

    <div class="col-12 col-lg-9">
        <div class="row">
            <div class="col-4 col-lg-4 col-md-4">
                <div class="card">
                    <div class="card-body px-2 py-2-2">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon purple mb-2">
                                    <i class="iconly-boldShow"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Total Students</h6>
                                <h6 class="font-extrabold mb-0">{{ $totalStudents }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-4 col-lg-4 col-md-4">
                <div class="card">
                    <div class="card-body px-2 py-2-2">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon blue mb-2">
                                    <i class="iconly-boldProfile"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Extracurriculars</h6>
                                <h6 class="font-extrabold mb-0">{{ $totalExtracurriculars }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-4 col-lg-4 col-md-4">
                <div class="card">
                    <div class="card-body px-2 py-2-2">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon green mb-2">
                                    <i class="iconly-boldAdd-User"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Students in Extracurriculars</h6>
                                <h6 class="font-extrabold mb-0">{{ $totalStudentsWithExtracurricular }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="col-12 col-lg-3">
        <div class="card">
            <div class="card-body py-4 px-4">
                <div class="d-flex align-items-center">
                    <div class="avatar avatar-xl">
                        <img src="./assets/compiled/jpg/1.jpg" alt="Face 1">
                    </div>
                    @if (auth()->check())
                        <div class="ms-3 name">
                            <a href="{{ route('edit.profile') }}"><h5 class="font-bold">Profile Admin</h5></a>
                            <h6 class="text-muted mb-0">{{ auth()->user()->firstName }}</h6>
                        </div>
                    @else
                        <div class="ms-3 name">
                            <h5 class="font-bold">Profile Admin</h5>
                            <h6 class="text-muted mb-0">Guest</h6>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
