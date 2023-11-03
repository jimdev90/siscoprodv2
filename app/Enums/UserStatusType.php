<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Inactive()
 * @method static static Active()
 */
final class UserStatusType extends Enum
{
    const Inactive =   0;
    const Active =   1;
}
