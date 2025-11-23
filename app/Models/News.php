<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Сущность "Новость"
 *
 * @property       string $title       Название
 * @property       string $description Описание новости
 * @property       int    $author_id   ID автора новости
 * @property-read  User   $author      Автор
 */
class News extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'description',
        'author_id',
    ];

    /**
     * Автор новости
     *
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
