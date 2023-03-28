<?php

const ROOT_FOLDER = __DIR__  . '/..';
require_once (ROOT_FOLDER . '/src/constants.php');
require_once (ROOT_FOLDER . '/src/Item.php');
require_once (ROOT_FOLDER . '/src/Order.php');

$itemList = require_once(ROOT_FOLDER . '/tests/item_data.php');
$order = new App\Order();
$order->setItems($itemList);

printf("Order gross price: %d\r\n", $order->calcGrossPrice());