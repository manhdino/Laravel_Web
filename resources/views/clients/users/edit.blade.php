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
    <form action="{{ route('users.post-update') }}" method="POST">
        <div class="mb-3">
            <label for="fullname">Họ và tên</label>
            <input type="text" id="fullname" class="form-control" name="fullname" placeholder="Họ và tên..."
                value="{{ old('fullname') ?? $userDetail->fullname }}">
            @error('fullname')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="text" id="email" class="form-control" name="email" placeholder="Email..."
                value="{{ old('email') ?? $userDetail->email }}">
            @error('email')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="group_id">Nhóm</label>
            <select name="group_id" id="" class="form-control">
                <option value="0">Chọn nhóm</option>
                @if (!empty($groupsList))
                    @foreach ($groupsList as $item)
                        <option value="{{ $item->id }}" {{ old('group_id') == $item->id ? 'selected' : false }}>
                            {{ $item->name }}</option>
                    @endforeach
                @endif
            </select>
            @error('group_id')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>


        <div class="mb-3">
            <label for="status">Trạng thái</label>
            <select name="status" id="" class="form-control">
                <option value="0" {{ old('status') == 0 ? 'selected' : false }}>Chưa kích hoạt</option>
                <option value="1" {{ old('status') == 1 ? 'selected' : false }}>Đã kích hoạt</option>
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('users.index') }}" class="btn btn-warning">Quay lại</a>
        @csrf
    </form>
    <hr>
@endsection
