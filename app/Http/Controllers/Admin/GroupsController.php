<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GroupsController extends Controller
{
    private $user = null;
    private $group = null;
    public function __construct()
    {
        $this->user = new User();
        $this->group = new Group();
    }

    public function index()
    {
        $lists = $this->group::all();
        return view('admin.groups.list', compact('lists'));
    }

    public function add()
    {
        return view('admin.groups.add');
    }

    public function postAdd(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|min:5|unique:groups,name',
            ],
            [
                'name.required' => 'Tên không được để trống',
                'name.unique' => 'Tên bị trùng,vui lòng chọn tên khác',
                'name.min' => 'Tên phải ít nhất :min kí tự'
            ],
        );
        $this->group->name = $request->name;
        $this->group->user_id = Auth::user()->id;
        $this->group->save();
        return redirect()->route('admin.groups.index')->with('msg', 'Thêm nhóm người dùng thành công');
    }

    public function edit(Group $group)
    {
        return view('admin.groups.edit', compact('group'));
    }

    public function postEdit(Request $request, Group $group)
    {
        $request->validate(
            [
                'name' => 'required|min:5|unique:groups,name,' . $group->id,
            ],
            [
                'name.required' => 'Tên không được để trống',
                'name.unique' => 'Tên bị trùng,vui lòng chọn tên khác',
                'name.min' => 'Tên phải ít nhất :min kí tự'
            ],
        );

        $group->name = $request->name;
        $group->save();
        return back()->with('msg', 'Cập nhật nhóm người dùng thành công');
    }

    public function delete(Group $group)
    {
        $userCount = $group->users->count();
        if ($userCount == 0) { //Trong nhóm người dùng ko có người dùng nào
            Group::destroy($group->id);
            return redirect()->route('admin.groups.index')->with('msg', 'Xóa nhóm người dùng thành công');
        }
        return redirect()->route('admin.groups.index')->with('msg_error', 'Nhóm ' . $group->name . ' vẫn còn ' . $userCount . ' người dùng nên không thể xóa');
    }
}
