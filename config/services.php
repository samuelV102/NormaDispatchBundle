<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use NormaUy\Bundle\NormaDispatchBundle\Service\Utils;
use NormaUy\Bundle\NormaDispatchBundle\Twig\NormaDispatchTwigExtension;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

return static function (ContainerConfigurator $container) {
    $services = $container->services()
        ->defaults()->private();

    $services
        ->set(Utils::class)->public()

        //Twing extensions
        ->set(NormaDispatchTwigExtension::class)
        ->arg(0, service(ParameterBagInterface::class))
        ->tag('twig.extension');
};
