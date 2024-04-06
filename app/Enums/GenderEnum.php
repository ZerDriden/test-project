<?php

namespace App\Enums;

enum GenderEnum: int
{
    case WOMAN = 0;
    case MAN = 1;

    public function label(): string
    {
        return match ($this) {
            GenderEnum::WOMAN => __('Женский'),
            GenderEnum::MAN => __('Мужской'),
        };
    }

    public static function getValues($separator = null): array|string|null
    {
        $array = array_column(self::cases(), 'value');

        return $separator ? implode($separator, $array) : $array;
    }
}
