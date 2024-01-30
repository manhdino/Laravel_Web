@extends('layouts.admin')

@section('title', 'Cập nhật bài viết')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cập nhật bài viết</h1>
    </div>


    <div class="mx-5">
        <form action="" method="POST">
            @if ($errors->any())
                <div class="alert alert-danger w-50">Vui lòng kiểm tra lại dữ liệu nhập vào</div>
            @endif
            @if (session('msg'))
                <div class="alert alert-success w-50">Cập nhật người dùng thành công</div>
            @endif
            <div class="mb-3">
                <label for="title">Tiêu đề</label>
                <input id="title" type="text" name="title" class="form-control w-50" placeholder="Tiêu đề..."
                    value="{{ old('title') ?? $post->title }}">
                @error('title')
                    <span class="text-danger ml-1 font-italic font-weight-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content">Nội dung</label>
                <textarea id="content" name="content" class="form-control w-50" rows="8" placeholder="Nội dung bài viết...">
                    {{ old('content') ?? $post->content }}
                </textarea>
                @error('content')
                    <span class="text-danger ml-1 font-italic font-weight-bold">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-success">Quay lại</a>
            @csrf
        </form>
    </div>
@endsection
