<?php

namespace App\Enums;

enum UserRole: string
{
    case Admin = 'Admin';
    case Applicant = 'Applicant';
}
