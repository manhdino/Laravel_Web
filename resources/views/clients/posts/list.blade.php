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
                </tr>
            </thead>
            <tbody>
                @if ($allPosts->count() > 0)
                    @foreach ($allPosts as $key => $item)
                        <tr>
                            <td><input type="checkbox" name='delete[]' value="{{ $item->id }}"></td>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->title }}</td>

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
