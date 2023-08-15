<?php

namespace NormaUy\Bundle\NormaDispatchBundle\Tests\Service;

use NormaUy\Bundle\NormaDispatchBundle\Service\Utils;
use NormaUy\Bundle\NormaDispatchBundle\Tests\TestApplication\NormaDispatchKernel;
use PHPUnit\Framework\TestCase;

/**
 * @author Samuel Alvarez <samale456uruguay@gmail.com>
 */
class UtilsTest extends TestCase
{
    public function testUnit()
    {
        $utils = new Utils();

        $isMobile = $utils->isMobile('');
        $this->assertIsBool($isMobile);
    }

    public function testServiceWiring()
    {
        $kernel = new NormaDispatchKernel();
        $kernel->boot();
        $container = $kernel->getContainer();
        $utils = $container->get(Utils::class);

        $this->assertInstanceOf(Utils::class, $utils);

        $isMobile = $utils->isMobile('');
        $this->assertIsBool($isMobile);
    }
}
