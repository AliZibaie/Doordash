<?php

namespace App\Enums;


use App\Traits\HasEnumValues;
use Filament\Support\Contracts\HasLabel;

enum DiscountType: string Implements HasLabel
{
    use HasEnumValues;

    case FIXED = 'fixed';

    case PERCENT = 'percent';
    public function getLabel(): ?string
    {
        return match ($this) {
            self::FIXED => 'fixed',
            self::PERCENT => 'percent',

        };
    }
}

