<?php

namespace GoDaddy\WordPress\MWC\Core\Features\Commerce\Catalog\Providers\DataObjects;

use GoDaddy\WordPress\MWC\Common\DataObjects\AbstractDataObject;

/**
 * Product meta collection DTO.
 */
class ProductMetaDataCollection extends AbstractDataObject
{
    public string $price;
    public string $regularPrice;
    public string $salePrice;

    /**
     * Creates a new data object.
     *
     * @param array{
     *     price: string,
     *     regularPrice: string,
     *     salePrice: string
     * } $data
     */
    public function __construct(array $data)
    {
        parent::__construct($data);
    }
}
