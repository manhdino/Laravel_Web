@extends('layouts.admin')

@section('title', 'Phân quyền ' . $group->name)

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Phân quyền: {{ $group->name }}</h1>
    </div>


    <div class="mx-5">
        @if ($errors->any())
            <div class="alert alert-danger w-50">Vui lòng kiểm tra lại dữ liệu nhập vào</div>
        @endif
        @if (session('msg'))
            <div class="alert alert-success w-50">{{ session('msg') }}</div>
        @endif
        <form action="" method="POST">
            <div class="w-75">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="5%">STT</th>
                            <th width="20%">Module</th>
                            <th class="text-center">Phân quyền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($modules->count() > 0)
                            @foreach ($modules as $key => $module)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $module->title }}</td>
                                    <td class="px-2">
                                        <div class="row">
                                            @if (!empty($roleList))
                                                @foreach ($roleList as $roleName => $roleValue)
                                                    <div class="col-2 text-center">
                                                        <label for="role_{{ $module->name }}_{{ $roleName }}">
                                                            <input id = "role_{{ $module->name }}_{{ $roleName }}"
                                                                type="checkbox" name="role[{{ $module->name }}][]"
                                                                {{ isRole($RolesArr, $module->name, $roleName) ? 'checked' : false }}
                                                                value="{{ $roleName }}">
                                                            {{ $roleValue }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            @endif
                                            @if ($module->name == 'groups')
                                                <div class="col-3 text-center">
                                                    <label for="role_{{ $module->name }}_permission">
                                                        <input id="role_{{ $module->name }}_permission" type="checkbox"
                                                            {{ isRole($RolesArr, $module->name, 'permission') ? 'checked' : false }}
                                                            name="role[{{ $module->name }}][]" value="permission">
                                                        Phân quyền
                                                    </label>
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        @endif

                    </tbody>
                </table>
            </div>
            <button type="submit" class="btn btn-primary">Phân quyền</button>
            <a href="{{ route('admin.groups.index') }}" class="btn btn-success">Quay lại</a>
            @csrf
        </form>

    </div>
@endsection
