@extends('layouts.admin')

@section('title', 'Cập nhật nhóm người dùng')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cập nhật nhóm người dùng</h1>
    </div>


    <div class="mx-5">
        <form action="" method="POST">
            @if ($errors->any())
                <div class="alert alert-danger w-50">Vui lòng kiểm tra lại dữ liệu nhập vào</div>
            @endif
            @if (session('msg'))
                <div class="alert alert-success w-50">Cập nhật nhóm người dùng thành công</div>
            @endif
            <div class="mb-3">
                <label for="name">Tên</label>
                <input id="name" type="text" name="name" class="form-control w-50" placeholder="Tên..."
                    value="{{ old('name') ?? $group->name }}">
                @error('name')
                    <span class="text-danger ml-1 font-italic font-weight-bold">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('admin.groups.index') }}" class="btn btn-success">Quay lại</a>
            @csrf
        </form>
    </div>
@endsection
