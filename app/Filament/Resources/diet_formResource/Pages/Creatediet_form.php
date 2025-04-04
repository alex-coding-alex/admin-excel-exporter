<?php

namespace App\Filament\Resources\diet_formResource\Pages;

use App\Filament\Resources\diet_formResource;
use Filament\Resources\Pages\CreateRecord;

class Creatediet_form extends CreateRecord
{
    protected static string $resource = diet_formResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
