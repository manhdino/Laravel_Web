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
    <a href="{{ route('users.add') }}" class="btn btn-primary">Thêm người dùng</a>
    <hr>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="5%">STT</th>
                <th>Tên</th>
                <th>Email</th>
                <th width="23%">Thời gian</th>
                <th width="7%">Sửa</th>
                <th width="7%">Xóa</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($usersList))
                @foreach ($usersList as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->fullname }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td><a href="{{ route('users.update', ['id' => $item->id]) }}" class="btn btn-warning btn-sm">Sửa</a>
                        </td>
                        <td><a href="" class="btn btn-danger btn-sm">Xóa</a></td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6">Không có người dùng</td>
                </tr>
            @endif

        </tbody>
    </table>
@endsection
