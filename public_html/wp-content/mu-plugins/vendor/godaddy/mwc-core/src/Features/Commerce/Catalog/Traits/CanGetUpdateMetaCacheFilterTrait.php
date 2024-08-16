<?php

namespace GoDaddy\WordPress\MWC\Core\Features\Commerce\Catalog\Traits;

use GoDaddy\WordPress\MWC\Common\Register\Register;
use GoDaddy\WordPress\MWC\Common\Register\Types\RegisterFilter;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Catalog\Interceptors\Handlers\UpdateProductMetaCacheHandler;
use GoDaddy\WordPress\MWC\Core\Features\Commerce\Enums\CustomWordPressCoreHook;

trait CanGetUpdateMetaCacheFilterTrait
{
    /**
     * Gets the meta cache filter instance.
     *
     * @return RegisterFilter
     */
    public function getUpdateMetaCacheFilter() : RegisterFilter
    {
        return Register::filter()
            ->setGroup(CustomWordPressCoreHook::UpdateMetaCache)
            ->setHandler([UpdateProductMetaCacheHandler::class, 'handle'])
            ->setPriority(PHP_INT_MAX)
            ->setArgumentsCount(3);
    }
}
