@extends('layouts.admin')

@section('title', 'No Authorization')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Bạn không có quyền truy cập</h1>
    </div>
    <div class="mx-5">
        <div class="d-flex justify-content-center vh-100 mt-5">
            <div class="text-center mt-5">
                <h1 class="display-1 fw-bold">403</h1>
                <p class="fs-3"> <span class="text-danger">Error!</span> Bạn không có quyền truy cập</p>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Go Admin Dashboard</a>
            </div>
        </div>
    </div>
@endsection
