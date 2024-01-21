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
    <h2>{{ $title }}</h2>


    <form action="{{ route('posts.delete-any') }}" method="POST" class="mb-3"
        onsubmit="return confirm('Bạn có chắc chắn muốn xóa.')">
        <button type="submit" class="btn btn-danger">Xoá(0)</button>
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="5%"><input type="checkbox" id="checkAll"></th>
                    <th width="5%">STT</th>
                    <th>Tiêu đề</th>
                    <th width="15%">Trạng thái</th>
                    <th width="15%">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if ($allPosts->count() > 0)
                    @foreach ($allPosts as $key => $item)
                        <tr>
                            <td><input type="checkbox" name='delete[]' value="{{ $item->id }}"></td>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->title }}</td>
                            <td>
                                @if ($item->trashed())
                                    <button class="btn btn-danger">Đã xóa</button>
                                @else
                                    <button class="btn btn-success">Chưa xóa</button>
                                @endif
                            </td>
                            <td>
                                @if ($item->trashed())
                                    <a href="{{ route('posts.restore', ['id' => $item->id]) }}"
                                        class="btn btn-primary mb-2">Khôi
                                        phục</a>
                                    <a href="{{ route('posts.force-delete', ['id' => $item->id]) }}"
                                        onclick="return confirm('Bạn có chắc muốn xóa vĩnh viễn.')"
                                        class="btn btn-danger">Xóa
                                        vĩnh viễn</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3" class="text-center">Không có bài viết </td>
                    </tr>
                @endif

            </tbody>
        </table>
        @csrf
    </form>
@endsection
