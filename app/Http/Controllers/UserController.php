<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Groups;
use  App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Phone;
use App\Models\Mechanics;
use App\Models\Country;
use App\Models\Categories;
use App\Models\Post;

class UserController extends Controller
{
    private $users;
    private $groups;

    const _PER_PAGE = 3;
    public function __construct()
    {
        $this->users = new Users();
        $this->groups = new Groups();
    }



    public function relations()
    {

        //One - One 
        //Có User tìm phone
        // $phone = Users::find(10)->phone;
        // $phone = Users::find(10)->phone();
        // $idPhone = $phone->id;
        // $phoneNumber = $phone->phone;
        // echo 'idPhone: ' . $idPhone . '<br/>';
        // echo 'phoneNumber: ' . $phoneNumber . '<br/>';

        //Có phone tìm User
        // $user = Phone::where('phone', '0872151234')->first()->user;
        // dd($user);

        //One - Many
        // $users = Groups::find(4)->users;
        // if ($users->count() > 0) {
        //     foreach ($users as $item) {
        //         echo  $item->fullname . '<br />';
        //     }
        // }

        //Tìm những Users do Administration quản lý 
        // $user = Groups::find(1)->users()->where('id', '>', 20)->get();

        // if ($user->count() > 0) {
        //     foreach ($user as $item) {
        //         echo  $item->fullname . '<br />';
        //     }
        // }

        //Cho 1 User tìm xem ô nào đang quản lý Users này
        // $group = Users::find(10)->group;
        // $groupName = $group->name;
        // dd($groupName);


        //Has On Through
        // $carOwner = Mechanics::find(1)->carOwner;

        //Has Many Through
        // $allPost = Country::find(1)->posts;
        // dd($allPost);

        //Many to Many
        // Cho category tìm ra tất cả bài viết liên quan
        // $allPosts = Categories::find(2)->posts;
        // dd($allPosts);

        //Cho id bài viết tìm các categories liên quan
        // $allCategories = Post::find(1)->categories;
        // dd($allCategories);

        //Nếu muốn lấy thêm dữ liệu của bảng trung gian(withPivot) và query data trong bảng trung gian
        // $allCategories = Post::find(1)->categories;
        // foreach ($allCategories as $category) {
        //     echo $category->pivot->created_at . ' ' . $category->pivot->status . '<br />';
        // }

        //Default Mode 
        // $phone = Users::find(10)->phone;
        // dd($phone);

        //Tìm bài Posts có ít nhất 2 comments 
        // $post = Post::has('comments')->get();
        // dd($post);

        //Trả về danh sách bài posts và có thêm 1 cột nữa là số lượng comments tương ứng với mỗi bài
        // $posts = Post::withCount('comments as cnt-comments')->get();
        // dd($posts);

        //Lazy Load(Tải dữ liệu 1 lần sử dụng with() thay vì sd all())
        //Lấy tất cả users 
        //     $users = Users::with(['group' => function ($query) {
        //         $query->where('name', 'Manager');
        //     }])->get();
        //     foreach ($users as $user) {
        //         if (!empty($user->group->name)) {
        //             echo $user->fullname . '<br/>';
        //         }
        //     }

        //Insert new data(comment) vào bài post cụ thể
        $post = Post::find(1);
        $comment = new Comments([
            'name' => 'Comment 3 Bài viết 1',
            'content' => 'Nội dung comment 3 bài viết 1'
        ]);
        $post->comments()->save($comment);
    }
    public function index(Request $request)
    {
        $title = 'Danh sách người dùng';

        // $statement = $this->users->statement('SELECT * FROM users');
        // dd($statement);
        // $this->users->learnQueryBuilder();

        $filters = [];

        if (!empty($request->status)) {
            $status = $request->status;
            // dd($status);
            if ($status == 'active') {
                $status = 1;
            } else {
                $status = 0;
            }
            $filters[] = ['users.status', '=', $status];
        }
        if (!empty($request->group_id)) {
            $group_id = $request->group_id;
            // dd($status);
            $filters[] = ['users.group_id', '=', $group_id];
        }

        $keywords = null;
        if (!empty($request->keywords)) {
            $keywords = $request->keywords;
        }


        $usersList = $this->users->getAllUsers($filters, Self::_PER_PAGE, $keywords);
        $groupsList = $this->groups->getAllGroups();

        //dd($users);
        // dd($groupsList);

        return view('clients.users.list', compact('title', 'usersList', 'groupsList'));
    }

    public function add()
    {
        $title = 'Thêm người dùng';
        $groupsList = $this->groups->getAllGroups();
        return view('clients.users.add', compact('title', 'groupsList'));
    }

    public function postAdd(Request $request)
    {
        $rules = [
            'fullname' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'group_id' => ['required', 'integer', function ($attribute, $value, $fails) {
                if ($value == 0) {
                    $fails(':attribute bắt buộc phải chọn');
                }
            }],
        ];

        $messages = [
            'fullname.required' => ':attribute bắt buộc phải nhập',
            'email.required' => ':attribute bắt buộc phải nhập',
            'fullname.min' => ':attribute phải có ít nhất :min kí tự',
            'email.email' => ':attribute không đúng định dạng',
            'email.unique' => ':attribute đã tồn tại',
            'group_id.required' => ':attribute không được để trống',
            'group_id.integer' => ':attribute không hợp lệ',
        ];

        $attributes = [
            'fullname' => 'Tên người dùng',
            'email' => 'Email',
            'group_id' => 'Nhóm',
        ];
        $request->validate($rules, $messages, $attributes);

        $dataInsert = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'group_id' => $request->group_id,
            'status' => $request->status,
            'created_at' => date('Y-m-d H:i:s')
        ];
        $this->users->addUser($dataInsert);
        return redirect()->route('users.index')->with('msg', 'Thêm người dùng thành công');
    }

    public function update(Request $request, $id = 0)
    {
        // dd($id);
        $title = 'Cập nhật người dùng';
        $groupsList = $this->groups->getAllGroups();
        if (!empty($id)) {
            $userDetail =  $this->users->getDetail($id);
            // dd($userDetail);
            if (!empty($userDetail[0])) {
                $userDetail = $userDetail[0];
                $request->session()->put('id', $id);
                return view('clients.users.edit', compact('title', 'userDetail', 'groupsList'));
            } else {
                return redirect()->route('users.index')->with('msg', 'Người dùng không tồn tại');
            }
        } else {
            return redirect()->route('users.index')->with('msg', 'Liên kết không tồn tại');
        }
    }

    public function postUpdate(UserRequest $request)
    {
        $id = session('id');
        if (empty($id)) {
            return back()->with('msg', 'Liên kết không tồn tại');
        }
        // $rules = [
        //     'fullname' => 'required|min:5',
        //     'email' => 'required|email|unique:users,email,' . $id,
        //     'group_id' => ['required', 'integer', function ($attribute, $value, $fails) {
        //         if ($value == 0) {
        //             $fails(':attribute bắt buộc phải chọn');
        //         }
        //     }],
        // ];

        // $messages = [
        //     'fullname.required' => ':attribute bắt buộc phải nhập',
        //     'email.required' => ':attribute bắt buộc phải nhập',
        //     'fullname.min' => ':attribute phải có ít nhất :min kí tự',
        //     'email.email' => ':attribute không đúng định dạng',
        //     'email.unique' => ':attribute đã tồn tại',
        //     'group_id.required' => ':attribute không được để trống',
        //     'group_id.integer' => ':attribute không hợp lệ',
        // ];

        // $attributes = [
        //     'fullname' => 'Tên người dùng',
        //     'email' => 'Email',
        //     'group_id' => 'Nhóm',
        // ];
        // $request->validate($rules, $messages, $attributes);

        // Dùng trong raw Sql
        // $dataUpdate = [
        //     $request->fullname,
        //     $request->email,
        //     date('Y-m-d H:i:s')
        // ];

        //Dùng trong query Builder
        $dataUpdate = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'group_id' => $request->group_id,
            'status' => $request->status,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $this->users->updateUser($dataUpdate, $id);
        return redirect()->back()->with('msg', 'Cập nhật người dùng thành công');
    }

    public function delete($id = 0)
    {
        if (!empty($id)) {
            $userDetail =  $this->users->getDetail($id);
            // dd($userDetail);
            if (!empty($userDetail[0])) {
                $deleteStatus = $this->users->deleteUser($id);
                if ($deleteStatus) {
                    $msg = 'Xóa người dùng thành công';
                } else {
                    $msg = 'Không thể xóa người dùng.Vui lòng kiểm tra lại';
                }
            } else {
                $msg = 'Người dùng không tồn tại';
            }
        } else {
            $msg = 'Liên kết không tồn tại';
        }
        return redirect()->route('users.index')->with('msg', $msg);
    }
}
