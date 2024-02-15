<?php

namespace App\Enums;


use App\Traits\HasEnumValues;
use Filament\Support\Contracts\HasLabel;

enum DiscountStatus: string Implements HasLabel
{
    use HasEnumValues;

    case DISABLE = 'disable';

    case ENABLE = 'enable';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::DISABLE => 'disable',
            self::ENABLE => 'enable',

        };
    }
}

