<?php

namespace App;

enum UserRoles: string
{
    case ADMIN = 'admin';
    case SPECIALIST = 'specialist';
    case CLIENT = 'client';
}
