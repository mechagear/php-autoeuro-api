<?php
declare(strict_types=1);

namespace Autoeuro\Service;

use Autoeuro\Api\Client;
use Autoeuro\Api\Service\BalanceService;
use Autoeuro\Api\Service\ServiceFactory;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use PHPUnit\Framework\MockObject\MockObject;
use \PHPUnit\Framework\TestCase;

class ServiceFactoryTest extends TestCase
{

    public function testGetValidService()
    {
        $factory = $this->getServiceFactoryMock();
        $factory->method('getServiceClass')->willReturn(BalanceService::class);
        $service = $factory->__get('balance');
        $this->assertInstanceOf(BalanceService::class, $service);
    }

    public function testGetValidServiceClass()
    {
        $factory = $this->getMockBuilder(ServiceFactory::class)
            ->disableOriginalConstructor()
            ->setMethodsExcept(['getServiceClass'])
            ->getMock();

        $reflection = new \ReflectionClass(ServiceFactory::class);
        $refProperty = $reflection->getProperty('classMap');
        $refProperty->setAccessible(true);
        $refProperty->setValue(['test' => 'testClass']);

        $serviceClass = $factory->getServiceClass('test');
        $this->assertEquals('testClass', $serviceClass);
    }

    public function testGetInvalidServiceClass()
    {
        $this->expectException(\Exception::class);
        $factory = $this->getMockBuilder(ServiceFactory::class)
            ->disableOriginalConstructor()
            ->setMethodsExcept(['getServiceClass'])
            ->getMock();

        $reflection = new \ReflectionClass(ServiceFactory::class);
        $refProperty = $reflection->getProperty('classMap');
        $refProperty->setAccessible(true);
        $refProperty->setValue([]); // any service is invalid from now

        $serviceClass = $factory->getServiceClass('');
    }

    public function testGetInvalidServiceEmpty()
    {
        $this->expectException(\Exception::class);
        $factory = $this->getServiceFactoryMock();
        $factory->method('getServiceClass')->willReturn('');
        $service = $factory->__get('');
    }

    /**
     * @return MockObject | ServiceFactory
     */
    private function getServiceFactoryMock()
    {
        return $this->getMockBuilder(ServiceFactory::class)
            ->setConstructorArgs([$this->createMock(Client::class), SerializerBuilder::create()->build()])
            ->setMethodsExcept(['__get'])
            ->getMock();
    }

}