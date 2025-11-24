<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsCrudController\StoreNewsRequest;
use App\Http\Requests\Admin\NewsCrudController\UpdateNewsRequest;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
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

    public function update(UpdateNewsRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $news = News::query()->findOrFail($validated['id']);
        $news?->update(Arr::except($validated, 'id'));

        return redirect()->route('admin.news.index')
            ->with('success', trans('admin/operations/edit.success_message'));
    }

    public function show(News $news)
    {
        return view('admin.news.show', compact('news'));
    }

    public function edit(News $news): View
    {
        return view('admin.news.edit', compact('news'));
    }

    public function destroy(News $news): RedirectResponse
    {
        $news->delete();

        return redirect()->route('admin.news.index')
            ->with('success', trans('admin/operations/destroy.success_message'));
    }
}