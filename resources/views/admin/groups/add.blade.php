@extends('layouts.admin')

@section('title', 'Thêm người dùng')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Thêm nhóm người dùng</h1>
    </div>


    <div class="mx-5">
        <form action="" method="POST">
            @if ($errors->any())
                <div class="alert alert-danger w-50">Vui lòng kiểm tra lại dữ liệu nhập vào</div>
            @endif
            <div class="mb-3">
                <label for="name">Tên</label>
                <input id="name" type="text" name="name" class="form-control w-50" placeholder="Tên..."
                    value="{{ old('name') }}">
                @error('name')
                    <span class="text-danger ml-1 font-italic font-weight-bold">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Thêm mới</button>
            <a href="{{ route('admin.groups.index') }}" class="btn btn-success">Quay lại</a>
            @csrf
        </form>
    </div>
@endsection
