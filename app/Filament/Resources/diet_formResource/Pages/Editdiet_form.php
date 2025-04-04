<?php

namespace App\Filament\Resources\diet_formResource\Pages;

use App\Filament\Resources\diet_formResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class Editdiet_form extends EditRecord
{
    protected static string $resource = diet_formResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
