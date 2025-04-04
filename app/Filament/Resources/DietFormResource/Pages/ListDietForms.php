<?php

namespace App\Filament\Resources\diet_formResource\Pages;

use App\Filament\Resources\DietFormResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDietForms extends ListRecords
{
    protected static string $resource = DietFormResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
