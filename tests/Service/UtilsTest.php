<?php

namespace NormaUy\Bundle\TemplateSymfonyBundle\Tests\Service;

use NormaUy\Bundle\TemplateSymfonyBundle\Service\Utils;
use NormaUy\Bundle\TemplateSymfonyBundle\Tests\TestApplication\TemplateKernel;
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
        $kernel = new TemplateKernel();
        $kernel->boot();
        $container = $kernel->getContainer();
        $utils = $container->get(Utils::class);

        $this->assertInstanceOf(Utils::class, $utils);

        $isMobile = $utils->isMobile('');
        $this->assertIsBool($isMobile);
    }
}
