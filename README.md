# How to test
```
# disable log
export APP_DEBUG=0 && php tests/test.php

# enable log
export APP_DEBUG=1 && php tests/test.php
```

# Requirement

## Amazon Shipping Service

They help Vietnamese buy products on amazon website.
After client provide items urls on Amazon, that will have:

```
- amazon_price
- product_weight
- width
- height
- depth
```

You have to write code to calculate gross price of an order (one order contains many items)
This is formulas:

```
- gross_price = item1_price + item2_price + ...
- item_price = amazon_price + shipping_fee
- shipping_fee = max (fee_by_weight, fee_by_dimensions, ...)
- fee_by_weight = product_weight x weight_coefficient
- fee_by_dimension = width x height x depth x dimension_coefficient
```

example coefficients:
```
- weight_coefficient: $11/kg
- dimension_coefficient: $11/m3
```

## Expectations:

- write strong OOP code
- coefficients are configurable
- shipping_fee are flexible
    - We can add new a shiping fee type, for example: fee_by_product_type. shiping_fee of a smartphone (300g) must be less than ship a diamond ring (10g)
        ```
        shipping_fee = max (fee_by_weight, fee_by_dimensions, fee_by_product_type, ...)
        ```
