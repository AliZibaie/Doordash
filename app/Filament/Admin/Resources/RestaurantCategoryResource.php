<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\RestaurantCategoryResource\Pages;
use App\Models\RestaurantCategory;
use Filament\Actions\CreateAction;
use Filament\Actions\ReplicateAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\ActionSize;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use League\CommonMark\Extension\Table\TableSection;
use Maatwebsite\Excel\Excel;
use PhpOffice\PhpSpreadsheet\Writer\Pdf;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;

class RestaurantCategoryResource extends Resource
{
    protected static ?string $model = RestaurantCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->toggleable(isToggledHiddenByDefault:true)
                    ->sortable(),
                TextColumn::make('type')
                   ->label('Categories')
                   ->searchable()
                   ->sortable()
                   ->toggleable(),
                TextColumn::make('registered_at')
                ->label('Date')
                    ->dateTime('Y M j h:i')
                    ->searchable()
                    ->sortable()
                    ->toggleable()
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\ForceDeleteAction::make(),
                    Tables\Actions\ViewAction::make(),
                ])
                    ->label('Actions')
                    ->size(ActionSize::Small)
                    ->button()
                    ->color('success'),
//                Forms\Components\Section::make('test')->columns([

//                    Tables\Actions\CreateAction::make()->button(),
//                ])


            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    ExportBulkAction::make()
                        ->exports([
                            ExcelExport::make('csv')->fromTable()->withWriterType(Excel::CSV)->askForFilename(),
                            ExcelExport::make('excel')->fromTable()->askForFilename(),
                        ])
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
            'index' => Pages\ListRestaurantCategories::route('/'),
            'create' => Pages\CreateRestaurantCategory::route('/create'),
            'edit' => Pages\EditRestaurantCategory::route('/{record}/edit'),
        ];
    }
}
