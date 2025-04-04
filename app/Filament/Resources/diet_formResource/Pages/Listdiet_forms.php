<?php

namespace App\Filament\Resources\diet_formResource\Pages;

use App\Filament\Resources\diet_formResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class Listdiet_forms extends ListRecords
{
    protected static string $resource = diet_formResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
