<?php

// coefficient constants
if (!defined('ITEM_COEFFICIENT_WEIGHT')) {
    define('ITEM_COEFFICIENT_WEIGHT', 11); // unit: $/kg
}
if (!defined('ITEM_COEFFICIENT_DIMENSION')) {
    define('ITEM_COEFFICIENT_DIMENSION', 11); // unit: $/m3
}

// shipping fee types
if (!defined('ITEM_FEE_BY_WEIGHT')) {
    define('ITEM_FEE_BY_WEIGHT', 1);
}
if (!defined('ITEM_FEE_BY_DIMENSION')) {
    define('ITEM_FEE_BY_DIMENSION', 2);
}
if (!defined('ITEM_FEE_BY_PRODUCT_TYPE')) {
    define('ITEM_FEE_BY_PRODUCT_TYPE', 3);
}

// min shipping fee
if (!defined('ITEM_MIN_SHIPPING_FEE')) {
    define('ITEM_MIN_SHIPPING_FEE', 0);
}

// product types
if (!defined('ITEM_TYPE_NONE')) {
    define('ITEM_TYPE_NONE', 0);
}
if (!defined('ITEM_TYPE_SMARTPHONE')) {
    define('ITEM_TYPE_SMARTPHONE', 1);
}
if (!defined('ITEM_TYPE_JEWELRY')) {
    define('ITEM_TYPE_JEWELRY', 2);
}
