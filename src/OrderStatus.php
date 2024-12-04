<?php

namespace Codebase42\VideoSweetEnum;

use Leocello\SweetEnum\SweetCase;
use Leocello\SweetEnum\SweetEnum;
use Leocello\SweetEnum\SweetEnumContract;

/**
 * @method string color()
 * @method string description()
 * @method array canChangeFrom()
 */
enum OrderStatus: string implements SweetEnumContract
{
    use SweetEnum;

    public const self DEFAULT = self::Pending;

    #[SweetCase(
        color: 'orange',
        description: 'Your order is pending',
        canChangeFrom: [
            ///
        ],
    )]
    case Pending = 'pending';

    #[SweetCase(
        color: 'yellow',
        description: 'Currently being processed',
        canChangeFrom: [
            self::Pending,
        ],
    )]
    case Processing = 'processing';

    #[SweetCase(
        color: 'blue',
        description: 'Your order will be with you shortly',
        canChangeFrom: [
            self::Processing,
        ],
    )]
    case Shipped = 'shipped';

    #[SweetCase(
        color: 'green',
        description: 'Your order has been delivered',
        canChangeFrom: [
            self::Shipped,
        ],
    )]
    case Delivered = 'delivered';

    #[SweetCase(
        color: 'gray',
        description: 'Cancelled',
        canChangeFrom: [
            self::Pending,
            self::Processing,
            self::Shipped,
        ],
    )]
    case Cancelled = 'cancelled';

    public function canChangeTo(self $newStatus): bool
    {
        return in_array($this, $newStatus->canChangeFrom());
    }
}
