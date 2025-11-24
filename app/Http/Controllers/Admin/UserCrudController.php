<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserCrudController extends Controller
{
    public function index()
    {
        return view('admin.users.index', ['users' => User::query()->get()]);
    }
}
