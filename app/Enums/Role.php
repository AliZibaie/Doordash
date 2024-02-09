<?php

namespace App\Enums;


use App\Traits\HasEnumValues;

enum Role: string
{
    use HasEnumValues;
    case ADMIN = 'admin';
    case SELLER = 'seller';
    case CUSTOMER = 'customer';
}

