<?php

namespace App\Enums;

/**
 * Пол пользователя
 */
enum UserGenderEnum: string
{
    // Не указан
    case UNKNOWN = 'unknown';

    // Мужской
    case MALE = 'male';

    // Женский
    case FEMALE = 'female';


    /**
     * Название пункта
     *
     * @return string
     */
    public function translate(): string
    {
        return trans('enums/user_gender.options.' . $this->value);
    }

    /**
     * Список для селектора
     *
     * @return array
     */
    public static function options(): array
    {
        $cases = self::cases();

        return array_combine(
            array_map(fn ($value) => $value->value, $cases),
            array_map(fn ($value) => $value->translate(), $cases)
        );
    }
}
