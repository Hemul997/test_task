<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserCrudController\StoreUserWithProfileRequest;
use App\Http\Services\UserService;
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

    public function store(StoreUserWithProfileRequest $request)
    {
        $validated = $request->validated();

        if (UserService::createUserWithProfile($validated)) {
            return redirect(route('admin.users.index'))
                ->with('success', trans('admin/operations/create.success_message'));
        }

        return back()->withInput()->with('error', trans('admin/operations/create.error_message'));
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {

    }

    public function update(User $user)
    {

    }
}
