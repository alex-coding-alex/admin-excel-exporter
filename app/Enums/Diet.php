<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum Diet: string implements HasLabel
{
    case Vegan = 'vegan';
    case Vegetarian = 'vegetarian';
    case Halal = 'halal';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Vegan => 'Vegan',
            self::Vegetarian => 'Vegetarian',
            self::Halal => 'Halal',
        };
    }
}
