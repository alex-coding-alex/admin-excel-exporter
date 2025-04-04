<?php

namespace App\Filament\Resources;

use App\Enums\Diet;
use App\Filament\Imports\DietFormImporter;
use App\Filament\Resources\diet_formResource\Pages;
use App\Models\DietForm;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ImportAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DietFormResource extends Resource
{
    protected static ?string $model = DietForm::class;

    protected static ?string $slug = 'diet-forms';

    protected static ?string $label = 'Diet Forms';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([//
                TextInput::make('name')
                    ->required(),

                TextInput::make('food_preference')
                    ->required(),

                Checkbox::make('allergies'),

                Select::make('diet')
                    ->options(Diet::class)
                    ->required(),

                Select::make('user_id')
                    ->disabled()
                    ->relationship('user', 'name')
                    ->default(Auth::user()->id)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->headerActions([
                ImportAction::make()
                    ->importer(DietFormImporter::class),
            ])
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('food_preference'),

                TextColumn::make('allergies'),

                TextColumn::make('diet'),

                TextColumn::make('user.name')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDietForms::route('/'),
            'create' => Pages\CreateDietForm::route('/create'),
            'edit' => Pages\EditDietForm::route('/{record}/edit'),
        ];
    }

    public static function getGlobalSearchEloquentQuery(): Builder
    {
        return parent::getGlobalSearchEloquentQuery()->with(['user']);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'user.name'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        $details = [];

        if ($record->user) {
            $details['User'] = $record->user->name;
        }

        return $details;
    }
}
