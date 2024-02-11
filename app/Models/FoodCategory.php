<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class FoodCategory extends Pivot
{
    use HasFactory, SoftDeletes;
    protected $table = 'food_categories';
    protected $fillable  = [
        'type',
        'registered_at',
    ];
}