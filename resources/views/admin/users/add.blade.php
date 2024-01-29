@extends('layouts.admin')

@section('title', 'Thêm người dùng')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Thêm người dùng</h1>
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
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control w-50" placeholder="Email..."
                    value="{{ old('email') }}">
                @error('email')
                    <span class="text-danger ml-1 font-italic font-weight-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" class="form-control w-50" placeholder="Mật khẩu...">
                @error('password')
                    <span class="text-danger ml-1 font-italic font-weight-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="group_id">Nhóm</label>
                <select name="group_id" id="group_id" class="form-control w-auto">
                    <option value="0">Chọn nhóm</option>
                    @if ($groups->count() > 0)
                        @foreach ($groups as $item)
                            <option value="{{ $item->id }}" {{ old('group_id') == $item->id ? 'selected' : false }}>
                                {{ $item->name }}</option>
                        @endforeach
                    @endif
                </select>
                @error('group_id')
                    <span class="text-danger ml-1 font-italic font-weight-bold">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Thêm mới</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-success">Quay lại</a>
            @csrf
        </form>
    </div>
@endsection
