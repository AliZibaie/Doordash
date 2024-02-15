<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $fillable = [
      'start_at',
      'expire_at',
      'description',
      'amount',
      'status',
      'type',
    ];
}
