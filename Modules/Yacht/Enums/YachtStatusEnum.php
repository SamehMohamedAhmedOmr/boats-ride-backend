<?php

namespace Modules\Yacht\Enums;

use Modules\Base\Enum\BaseEnum;

class YachtStatusEnum extends BaseEnum
{
    const PENDING = '1';
    const APPROVE = '2';
    const MAINTENANCE = '3';
}