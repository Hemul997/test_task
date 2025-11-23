<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsController\IndexNewsRequest;
use App\Http\Requests\NewsController\StoreNewsRequest;
use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexNewsRequest $request): AnonymousResourceCollection
    {
        $validated = $request->validated();

        $news = News::query()
            ->with(['author'])
            ->paginate($validated['per_page'] ?? 10)
            ->appends($validated);

        return NewsResource::collection($news);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsRequest $request): NewsResource
    {
        $validated = $request->validated();

        $news = News::query()->create($validated);

        if ($news->wasRecentlyCreated) {
            return NewsResource::make($news);
        }

        throw new HttpException(Response::HTTP_UNPROCESSABLE_ENTITY, 'Не удалось создать новость');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news): NewsResource
    {
        return NewsResource::make($news);
    }
}
