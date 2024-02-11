<?php

namespace App\Filament\Admin\Resources\FoodCategoryResource\Pages;

use App\Filament\Admin\Resources\FoodCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFoodCategory extends CreateRecord
{
    protected static string $resource = FoodCategoryResource::class;
}
