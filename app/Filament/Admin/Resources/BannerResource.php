<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\BannerResource\Pages;
use App\Models\Banner;
use App\Models\Image;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
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
                TextInput::make('alt'),
                TextInput::make('title'),
                TextInput::make('text'),
                Fieldset::make('image')
                    ->relationship('image')
                    ->schema([
                        FileUpload::make('url')
                            ->directory('banners'),
                    ])
//                FileUpload::make('url')
//                    ->label('image'),
//                Grid::make()
//                    ->relationship('image')
//                    ->schema([
//                        FileUpload::make('url')
//                            ->directory('banners')
//                            ->image(),
//                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
//        dd(Tables\Columns\ImageColumn::make('image.url')->url('app/public/banners/01HPHEV46Y15A17FB886K19QKR.webp'));
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('alt'),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('text'),
                Tables\Columns\ImageColumn::make('image.url')
                    ->label('Image')
//                    ->width(100)
//                    ->height(100)
//                    ->url(Storage::url())
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
