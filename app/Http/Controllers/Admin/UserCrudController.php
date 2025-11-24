<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserCrudController\StoreUserWithProfileRequest;
use App\Http\Requests\Admin\UserCrudController\UpdateUserWithProfileRequest;
use App\Http\Services\UserService;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;

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
        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUserWithProfileRequest $request)
    {
        $validated = $request->validated();
        /** @var User $user */
        $user = User::query()->findOrFail($validated['id']);
        Arr::forget($validated, 'id');

        if (UserService::updateUserWithProfile($user, $validated)) {
            return redirect(route('admin.users.index'))
                ->with('success', trans('admin/operations/edit.success_message'));
        }

        return back()->withInput()->with('error', trans('admin/operations/edit.error_message'));
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', trans('admin/operations/destroy.success_message'));
    }
}
