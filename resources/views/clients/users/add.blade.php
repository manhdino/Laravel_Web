@extends('layouts.client')

@section('title')
    {{ $title }}
@endsection

@section('content')
    @if (session('msg'))
        <div class="alert alert-success text-center">
            {{ session('msg') }}
        </div>
    @endif
    <h2 class="mb-4">{{ $title }}</h2>
    @if ($errors->any())
        <div class="alert alert-danger text-center">Dữ liệu không hợp lệ. Vui lòng nhập lại</div>
    @endif
    <form action="" method="POST">
        <div class="mb-3">
            <label for="fullname">Họ và tên</label>
            <input type="text" id="fullname" class="form-control" name="fullname" placeholder="Họ và tên..."
                value="{{ old('fullname') }}">
            @error('fullname')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="text" id="email" class="form-control" name="email" placeholder="Email..."
                value="{{ old('email') }}">
            @error('email')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Thêm mới</button>
        <a href="{{ route('users.index') }}" class="btn btn-warning">Quay lại</a>
        @csrf
    </form>
    <hr>
@endsection
