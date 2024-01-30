@extends('layouts.admin')

@section('title', 'Danh sách bài viết')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Danh sách bài viết</h1>
    </div>


    <div class="mx-5">
        @can('create', App\Models\Post::class)
            <a href="{{ route('admin.posts.add') }}" class="btn btn-primary">Thêm mới</a>
            <hr>
        @endcan

        @if (session('msg'))
            <div class="alert alert-success w-25">{{ session('msg') }}</div>
        @endif
        @if (session('msg_error'))
            <div class="alert alert-danger w-25">{{ session('msg_error') }}</div>
        @endif
        <table class="table table-bordered">

            <thead>
                <tr>
                    <th width="5%">STT</th>
                    <th width="15%">Tiêu đề</th>
                    <th>Nội dung</th>
                    <th width="15%">Tác giả</th>
                    <th width="13%">Thời gian</th>
                    @can('posts.edit')
                        <th width="5%">Sửa</th>
                    @endcan
                    @can('posts.delete')
                        <th width="5%">Xoá</th>
                    @endcan

                </tr>
            </thead>
            <tbody>

                @if ($lists->count() > 0)
                    @foreach ($lists as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->content }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->created_at }}</td>
                            @can('posts.edit')
                                <td>
                                    <a href="{{ route('admin.posts.edit', $item) }}" class="btn btn-warning">Sửa</a>
                                </td>
                            @endcan

                            @can('posts.delete')
                                <td>
                                    <a href="{{ route('admin.posts.delete', $item) }}" class="btn btn-danger"
                                        onclick="return confirm('Bạn chắc chắn có muốn xóa?')">Xóa</a>
                                </td>
                            @endcan
                        </tr>
                    @endforeach

                @endif

            </tbody>
        </table>
    </div>
@endsection
