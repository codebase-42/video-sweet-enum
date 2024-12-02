<?php

namespace Codebase42\VideoSweetEnum;

enum OrderStatus: string
{
    case Pending = 'pending';
    case Processing = 'processing';
    case Shipped = 'shipped';
    case Delivered = 'delivered';
    case Cancelled = 'cancelled';

    public function label(): string
    {
        return match ($this) {
            self::Pending => 'Pending',
            self::Processing => 'Processing',
            self::Shipped => 'Shipped',
            self::Delivered => 'Delivered',
            self::Cancelled => 'Cancelled',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Pending => 'orange',
            self::Processing => 'yellow',
            self::Shipped => 'blue',
            self::Delivered => 'green',
            self::Cancelled => 'gray',
        };
    }

    public function description(): string
    {
        return match ($this) {
            self::Pending => 'Your order is pending',
            self::Processing => 'Currently being processed',
            self::Shipped => 'Your order will be with you shortly',
            self::Delivered => 'Your order has been delivered',
            self::Cancelled => 'Cancelled',
        };
    }

    public function canChangeTo(self $newStatus): bool
    {
        return match ($newStatus) {
            self::Pending => false,
            self::Processing => $this == self::Pending,
            self::Shipped => $this == self::Processing,
            self::Delivered => $this == self::Shipped,
            self::Cancelled => !in_array($this, [self::Delivered, self::Cancelled]),
        };
    }
}
