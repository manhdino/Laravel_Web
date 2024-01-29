<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    }

    public function postAdd()
    {
    }

    public function edit(Group $group)
    {
    }

    public function postEdit(Group $group)
    {
    }

    public function delete(Group $group)
    {
    }
}
