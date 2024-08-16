<?php

namespace GoDaddy\WordPress\MWC\Core\Features\Commerce\Catalog\Services;

use Exception;
use GoDaddy\WordPress\MWC\Common\Helpers\ArrayHelper;
use GoDaddy\WordPress\MWC\Common\Helpers\StringHelper;
use GoDaddy\WordPress\MWC\Common\Helpers\TypeHelper;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Catalog\Providers\DataObjects\ProductBase;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Catalog\Providers\DataObjects\ProductMetaDataCollection;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Catalog\Providers\DataSources\Adapters\ProductPostMetaAdapter;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Catalog\Traits\CanGetUpdateMetaCacheFilterTrait;

/**
 * Service class to update Commerce-originating product data in the local database.
 */
class UpdateLocalProductMetaDataService
{
    use CanGetUpdateMetaCacheFilterTrait;

    /**
     * Handles updating product post meta.
     *
     * @param int $localId
     * @param ProductBase $productBase
     * @return void
     */
    public function handle(int $localId, ProductBase $productBase) : void
    {
        $this->clearPostMetaCache($localId);

        $this->updateOrDeleteProductMeta($localId, $productBase);
    }

    /**
     * Clears the post meta cache.
     *
     * @param int $localId
     * @return void
     */
    public function clearPostMetaCache(int $localId) : void
    {
        wp_cache_delete($localId, 'post_meta');
    }

    /**
     * Gets the meta collection derived from the {@see ProductBase} DTO.
     *
     * @param ProductBase $productBase
     * @return ProductMetaDataCollection
     */
    protected function getMetaDataCollection(ProductBase $productBase) : ProductMetaDataCollection
    {
        $meta = ProductPostMetaAdapter::getNewInstance($productBase)
            ->convertFromSource();

        return ProductMetaDataCollection::getNewInstance([
            'price'        => TypeHelper::ensureString(ArrayHelper::get($meta, '_price')),
            'regularPrice' => TypeHelper::ensureString(ArrayHelper::get($meta, '_regular_price')),
            'salePrice'    => TypeHelper::ensureString(ArrayHelper::get($meta, '_sale_price')),
        ]);
    }

    /**
     * Updates or deletes product post meta.

     * @param int $localId
     * @param ProductBase $productBase
     * @return void
     */
    protected function updateOrDeleteProductMeta(int $localId, ProductBase $productBase) : void
    {
        try {
            // Temporarily disable the meta cache filter.
            $this->getUpdateMetaCacheFilter()->deregister();
        } catch(Exception $exception) {
            // do nothing.
        }

        $metadata = $this->getMetaDataCollection($productBase)->toArray();

        foreach ($metadata as $metaKey => $metaValue) {
            $metaKey = $this->formatProtectedMetaKey($metaKey);

            if (empty($metaValue) && '_price' !== $metaKey) {
                delete_post_meta($localId, $metaKey);
            } else {
                update_post_meta($localId, $metaKey, $metaValue);
            }
        }

        try {
            // Re-register the meta cache filter.
            $this->getUpdateMetaCacheFilter()->execute();
        } catch(Exception $exception) {
            // do nothing.
        }
    }

    /**
     * Formats a "protected" meta key.
     *
     * @param string $key
     * @return string
     */
    protected function formatProtectedMetaKey(string $key) : string
    {
        return StringHelper::startWith(StringHelper::snakeCase($key), '_');
    }
}
