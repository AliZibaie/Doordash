<?php

namespace App\Filament\Admin\Resources\FoodCategoryResource\Pages;

use App\Filament\Admin\Resources\FoodCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFoodCategory extends EditRecord
{
    protected static string $resource = FoodCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
