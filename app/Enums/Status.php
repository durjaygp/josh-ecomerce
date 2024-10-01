<?php

namespace App\Enums;

use Rexlabs\Enum\Enum;

class Status extends Enum
{
    const IN_PROGRESS = 'in_progress';
    const COMPLETE = 'complete';
    const SHIPPED = 'shipped';
    const DELIVERED = 'delivered';
    const PENDING = 'pending';
    const FAILED = 'failed';
    const CANCELED = 'canceled';

    public static function map() : array
    {
        return [
            static::IN_PROGRESS => 'In Progress',
            static::COMPLETE => 'Complete',
            static::FAILED => 'Failed',
            static::SHIPPED => 'Shipped',
            static::DELIVERED => 'Delivered',
            static::PENDING => 'Pending',
            static::CANCELED => 'Canceled',
        ];
    }
}


