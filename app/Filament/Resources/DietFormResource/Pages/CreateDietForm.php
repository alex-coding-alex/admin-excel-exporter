<?php

namespace App\Filament\Resources\diet_formResource\Pages;

use App\Filament\Resources\DietFormResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDietForm extends CreateRecord
{
    protected static string $resource = DietFormResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
