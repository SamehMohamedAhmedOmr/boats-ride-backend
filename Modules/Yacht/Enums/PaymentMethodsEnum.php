<?php

namespace Modules\Yacht\Enums;

use Modules\Base\Enum\BaseEnum;

class PaymentMethodsEnum extends BaseEnum
{   
    const CASH = '1';
    const CREDIT_CARD = '2';
    const BANK_TRANSFER = '3';
    const INVOICE = '4';
    const E_INVOICE = '5';
}