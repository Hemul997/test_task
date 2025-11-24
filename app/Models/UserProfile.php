<?php

namespace App\Models;

use App\Enums\UserGenderEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Сущность "Профиль пользователя"
 *
 * @property      int            $user_id  ID пользователя
 * @property-read User           $user     пользователь, к которому привязан профиль
 * @property      UserGenderEnum $gender   Пол
 * @property      Carbon         $birthday Дата рождения
 * @property      string         $phone    Номер телефона
 * @property      Carbon         $created_at
 */
class UserProfile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'gender',
        'birthday',
        'phone',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'gender'   => UserGenderEnum::class,
            'birthday' => 'date:Y-m-d',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
