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

    <form action="" method="GET" class="mb-3">
        <div class="row">
            <div class="col-3">
                <select class="form-control" name="status">
                    <option value="0">Tất cả trạng thái</option>
                    <option value="active" {{ request()->status == 'active' ? 'selected' : false }}>Kích hoạt</option>
                    <option value="inactive"{{ request()->status == 'inactive' ? 'selected' : false }}>Chưa kích hoạt
                    </option>
                </select>
            </div>
            <div class="col-3">
                <select class="form-control" name="group_id">
                    <option value="0">Tất cả nhóm</option>
                    @if (!empty($groupsList))
                        @foreach ($groupsList as $item)
                            <option value="{{ $item->id }}" {{ request()->group_id == $item->id ? 'selected' : false }}>
                                {{ $item->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="col-4"><input type="search" class="form-control" name="keywords" placeholder="Từ khóa tìm kiếm..."
                    value="{{ request()->keywords }}">
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-primary btn-block">Tìm kiếm</button>
            </div>
        </div>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="5%">STT</th>
                <th>Tên</th>
                <th width="25%">Email</th>
                <th width="18%">Thời gian</th>
                <th>Nhóm</th>
                <th>Trạng thái</th>
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
                        <td>{{ $item->group_name }}</td>
                        <td>{!! $item->status == 0
                            ? '<button class="btn btn-danger btn-sm">Chưa kích hoạt</button>'
                            : '<button class="btn btn-success btn-sm">Kích hoạt</button>' !!}</td>
                        <td><a href="{{ route('users.update', ['id' => $item->id]) }}"
                                class="btn btn-warning btn-sm">Sửa</a>
                        </td>
                        <td><a href={{ route('users.delete', ['id' => $item->id]) }} class="btn btn-danger btn-sm">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" class="text-center">Không có người dùng</td>
                </tr>
            @endif

        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $usersList->appends($_GET)->links() }}
    </div>
@endsection
