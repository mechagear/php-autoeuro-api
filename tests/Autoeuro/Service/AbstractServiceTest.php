<?php
declare(strict_types=1);

namespace Autoeuro\Service;

use PHPUnit\Framework\TestCase;
use Autoeuro\Api\Client;
use Autoeuro\Api\ClientInterface;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use PHPUnit\Framework\MockObject\MockObject;

abstract class AbstractServiceTest extends TestCase
{
    /**
     * @return MockObject|ClientInterface
     */
    protected function getApiClientMock()
    {
        return $this->getMockBuilder(Client::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function getSerializer(): SerializerInterface
    {
        return SerializerBuilder::create()->build();
    }
}