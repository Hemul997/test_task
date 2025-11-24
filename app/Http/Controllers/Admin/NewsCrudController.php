<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsCrudController\StoreNewsRequest;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class NewsCrudController extends Controller
{
    public function index(): View
    {
        return view('admin.news.index', ['news' => News::query()->get()]);
    }

    public function create(): View
    {
        return view('admin.news.create');
    }

    public function store(StoreNewsRequest $request): RedirectResponse
    {
        News::query()->create($request->validated());

        return redirect()->route('admin.news.index')
            ->with('success', trans('admin/operations/create.success_message'));
    }
}