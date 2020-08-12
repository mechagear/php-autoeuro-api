<?php
declare(strict_types=1);

namespace Autoeuro\Api\Service;

class ServiceFactory extends AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'brands'        => BrandService::class,
        'subdivisions'  => SubdivisionService::class,
        'deliveries'    => DeliveryService::class,
        'balance'       => BalanceService::class,
        'products'      => ProductsService::class,
        'cart'          => CartService::class,
    ];

    /**
     * @inheritDoc
     */
    protected function getServiceClass(string $name): string
    {
        if (!isset(self::$classMap[$name])) {
            throw new \Exception(sprintf("Unknown service '%s'", $name));
        }
        return self::$classMap[$name];
    }
}