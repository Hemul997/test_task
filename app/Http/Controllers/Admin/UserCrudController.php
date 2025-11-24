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

    public function create()
    {
        return view('admin.users.create');
    }

    public function store()
    {

    }

    public function show(User $user)
    {

    }

    public function edit(User $user)
    {

    }

    public function update(User $user)
    {

    }
}
