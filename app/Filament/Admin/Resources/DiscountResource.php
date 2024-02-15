<?php

namespace App\Filament\Admin\Resources;

use App\Enums\DiscountStatus;
use App\Enums\DiscountType;
use App\Filament\Admin\Resources\DiscountResource\Pages;
use App\Models\Banner;
use App\Models\Discount;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DiscountResource extends Resource
{
    protected static ?string $model = Discount::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('description'),
                TextInput::make('amount')->numeric(),
                DateTimePicker::make('expire_at'),
                DateTimePicker::make('start_at'),
                Select::make('type')
                    ->options(DiscountType::class),
                Select::make('status')
                    ->options(DiscountStatus::class),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->toggleable(isToggledHiddenByDefault:true)
                    ->searchable()
                    ->sortable(),
                TextColumn::make('start_at')
                    ->toggleable()
                    ->searchable()
                    ->sortable()
                    ->dateTime('M j h:i'),
                TextColumn::make('expire_at')
                    ->toggleable()
                    ->searchable()
                    ->sortable()
                    ->dateTime('M j h:i'),
                TextColumn::make('description')
                    ->toggleable()
                    ->searchable()
                    ->wrap()
                    ->words(3),
                ToggleColumn::make('is_food_party')
                    ->toggleable()
                    ->searchable()
                    ->beforeStateUpdated(function ($record, $state) {
                        Discount::query()->update(['is_food_party'=>false]);
                    }),
                TextColumn::make('amount')
                    ->toggleable()
                    ->searchable(),
                SelectColumn::make('status')
                    ->options(DiscountStatus::class)
                    ->selectablePlaceholder(false),
                SelectColumn::make('type')
                    ->options(DiscountType::class)
            ->selectablePlaceholder(false),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDiscounts::route('/'),
            'create' => Pages\CreateDiscount::route('/create'),
            'edit' => Pages\EditDiscount::route('/{record}/edit'),
        ];
    }
}
