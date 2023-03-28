<?php

namespace App;

class Item
{
    const ITEM_FEE_TYPES = [
        ITEM_FEE_BY_WEIGHT,
        ITEM_FEE_BY_DIMENSION,
        // ITEM_FEE_BY_PRODUCT_TYPE,
    ];

    protected $itemProperties;

    public function __construct($data)
    {
        $this->itemProperties = $data;
    }

    public function calcItemPrice()
    {
        $result = $this->itemProperties['amazon_price'] + $this->calcShippingFee();
        if (getenv('APP_DEBUG')) {
            print_r($this->itemProperties);
            printf("Price: %d\r\n", $result);
            printf("------------\r\n");
        }
        return $result;
    }

    protected function calcShippingFee()
    {
        $feeOfTypes = [];
        foreach (self::ITEM_FEE_TYPES as $itemType) {
            $feeOfTypes[] = $this->calcShippingFeeByType($itemType);
        }

        if (empty($feeOfTypes)) {
            return 0;
        }

        return max($feeOfTypes);
    }

    protected function calcShippingFeeByType($type)
    {
        switch ($type) {
            case ITEM_FEE_BY_WEIGHT:
                return $this->calcShippingFeeByWeight(
                    ITEM_COEFFICIENT_WEIGHT,
                    $this->itemProperties['product_weight']
                );

            case ITEM_FEE_BY_DIMENSION:
                return $this->calcShippingFeeByDimension(
                    ITEM_COEFFICIENT_DIMENSION,
                    $this->itemProperties['width'],
                    $this->itemProperties['height'],
                    $this->itemProperties['depth']
                );

            case ITEM_FEE_BY_PRODUCT_TYPE:
                return $this->calcShippingFeeByProductType();

            default:
                return 0;
        }
    }

    protected function calcShippingFeeByWeight($coefficient, $weight)
    {
        $result = max($coefficient * $weight, ITEM_MIN_SHIPPING_FEE);

        if (getenv('APP_DEBUG')) {
            printf("FeeByWeight: %d\r\n", $result);
        }

        return $result;
    }

    protected function calcShippingFeeByDimension($coefficient, $width, $height, $depth)
    {
        $result = max($coefficient * $width * $height * $depth, ITEM_MIN_SHIPPING_FEE);

        if (getenv('APP_DEBUG')) {
            printf("FeeByDimension: %d\r\n", $result);
        }

        return $result;
    }

    protected function calcShippingFeeByProductType($productType = ITEM_TYPE_NONE, $params = [])
    {
        // TODO impelement function body
        $result = 0;

        if (getenv('APP_DEBUG')) {
            printf("FeeByProductType: %d\r\n", $result);
        }

        return $result;
    }
}