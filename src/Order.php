<?php

namespace Codebase42\VideoSweetEnum;

class Order
{
    public OrderStatus $status = OrderStatus::Pending {
        get => $this->status;
        set {
            if (!$this->status->canChangeTo($value)) {
                throw new \Exception('Wrong status flow');
            }

            $this->status = $value;
        }
    }

    public function __construct() {
        ///
    }
}
