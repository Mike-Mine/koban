<?php

namespace App\Enum;

enum UserRoles: string
{
    case ADMIN = 'admin';
    case SPECIALIST = 'specialist';
    case CLIENT = 'client';
}
