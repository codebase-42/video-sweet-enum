<?php

use Codebase42\VideoSweetEnum\Order;
use Codebase42\VideoSweetEnum\OrderStatus;

require_once __DIR__ . '/../vendor/autoload.php';

$order = new Order;
echo "<span style=\"color: {$order->status->color()}\">{$order->status->description()}</span><br><br>";

$order->status = OrderStatus::Processing;
echo "<span style=\"color: {$order->status->color()}\">{$order->status->description()}</span><br><br>";

$order->status = OrderStatus::Cancelled;
echo "<span style=\"color: {$order->status->color()}\">{$order->status->description()}</span><br><br>";

$order->status = OrderStatus::Pending;
echo "<span style=\"color: {$order->status->color()}\">{$order->status->description()}</span><br><br>";
