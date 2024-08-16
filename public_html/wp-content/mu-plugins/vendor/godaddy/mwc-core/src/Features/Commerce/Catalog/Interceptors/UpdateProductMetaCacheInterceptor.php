<?php

namespace GoDaddy\WordPress\MWC\Core\Features\Commerce\Catalog\Interceptors;

use Exception;
use GoDaddy\WordPress\MWC\Common\Interceptors\AbstractInterceptor;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Catalog\Traits\CanGetUpdateMetaCacheFilterTrait;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Catalog\Traits\CanLoadWhenReadsEnabledTrait;

/**
 * Interceptor for updating the product meta cache. {@see update_meta_cache()}.
 */
class UpdateProductMetaCacheInterceptor extends AbstractInterceptor
{
    use CanGetUpdateMetaCacheFilterTrait;
    use CanLoadWhenReadsEnabledTrait;

    /**
     * Adds the hooks.
     *
     * @return void
     * @throws Exception
     */
    public function addHooks() : void
    {
        $this->getUpdateMetaCacheFilter()->execute();
    }
}
