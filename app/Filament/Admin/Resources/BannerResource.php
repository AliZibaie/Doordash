<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\BannerResource\Pages;
use App\Models\Banner;
use App\Models\Image;
use Filament\Forms;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\IconPosition;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('tabs')->tabs([
                    Forms\Components\Tabs\Tab::make('Advertisement texts')->schema([
                        TextInput::make('title')
                            ->required()
                            ->minLength(3),
                        MarkdownEditor::make('text')
                            ->required()
                            ->minLength(5),
                        ])
                        ->icon('heroicon-m-presentation-chart-line')
                        ->iconPosition(IconPosition::Before),
                        Forms\Components\Tabs\Tab::make('Image')->schema([
                            Fieldset::make('Upload image here')
                                ->relationship('image')
                                ->schema([
                                    FileUpload::make('url')
                                        ->label('Image')
                                        ->directory('banners')
                                        ->image()
                                        ->imageEditor()
                                        ->required()
                                        ->minSize(2)
                                        ->maxSize(1000),
                                ])->columns(1),
                            TextInput::make('alt')->label('An alternative text for image')
                                ->required()
                                ->minLength(3)
                                ->maxLength(255),
                        ])->icon('heroicon-m-photo')
                            ->iconPosition(IconPosition::Before),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('alt'),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('text'),
                Tables\Columns\ImageColumn::make('image.url')
                    ->width(400)
                    ->height(100)
                    ->label('Image')
//                    ->height(100)
//                    ->url(Storage::url())
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
//            ImageRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBanners::route('/'),
            'create' => Pages\CreateBanner::route('/create'),
            'edit' => Pages\EditBanner::route('/{record}/edit'),
        ];
    }
}
