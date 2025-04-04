<?php

namespace App\Filament\Imports;

use App\Enums\Diet;
use App\Models\DietForm;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Illuminate\Validation\Rule;

class DietFormImporter extends Importer
{
    protected static ?string $model = DietForm::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('name')
                ->example('Jolenta')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('food_preference')
                ->example('meat')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('allergies')
                ->example('true')
                ->requiredMapping()
                ->boolean()
                ->rules(['required', 'boolean']),
            ImportColumn::make('diet')
                ->example('halal')
                ->requiredMapping()
                ->rules([Rule::enum(Diet::class)]),
            ImportColumn::make('user')
                ->relationship(),
        ];
    }

    public function resolveRecord(): ?DietForm
    {
        // return DietForm::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new DietForm;
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your diet form import has completed and '.number_format($import->successful_rows).' '.str('row')->plural($import->successful_rows).' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' '.number_format($failedRowsCount).' '.str('row')->plural($failedRowsCount).' failed to import.';
        }

        return $body;
    }

    public function getJobRetryUntil(): ?CarbonInterface
    {
        // Do not use default filament retries and only retry once
        return Carbon::now();
    }
}
