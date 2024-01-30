@extends('layouts.admin')

@section('title', 'Danh sách người dùng')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Danh sách người dùng</h1>
    </div>


    <div class="mx-5">
        <a href="{{ route('admin.users.add') }}" class="btn btn-primary">Thêm mới</a>
        <hr>
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
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Nhóm</th>
                    <th width="13%">Thời gian</th>
                    <th width="5%">Sửa</th>
                    <th width="5%">Xóa</th>
                </tr>
            </thead>
            <tbody>

                @if ($lists->count() > 0)
                    @foreach ($lists as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->group->name }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>

                                <a href="{{ route('admin.users.edit', $item) }}" class="btn btn-warning">Sửa</a>

                            </td>
                            <td>
                                {{-- @if (Auth::user()->id !== $item->id)
                                    <a href="{{ route('admin.users.delete', $item) }}" class="btn btn-danger"
                                        onclick="return confirm('Bạn chắc chắn có muốn xóa?')">Xóa</a>
                                @endif --}}
                                <a href="{{ route('admin.users.delete', $item) }}" class="btn btn-danger"
                                    onclick="return confirm('Bạn chắc chắn có muốn xóa?')">Xóa</a>
                            </td>
                        </tr>
                    @endforeach

                @endif

            </tbody>
        </table>
    </div>
@endsection
