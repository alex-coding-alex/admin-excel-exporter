<?php

namespace App\Filament\Resources\diet_formResource\Pages;

use App\Filament\Resources\DietFormResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDietForm extends EditRecord
{
    protected static string $resource = DietFormResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
