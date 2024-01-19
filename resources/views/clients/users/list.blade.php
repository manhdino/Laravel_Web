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
                <th width="20%">Thời gian</th>
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
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">Không có người dùng</td>
                </tr>
            @endif

        </tbody>
    </table>
@endsection
