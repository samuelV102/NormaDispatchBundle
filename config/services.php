<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use NormaUy\Bundle\TemplateSymfonyBundle\Service\Utils;
use NormaUy\Bundle\TemplateSymfonyBundle\Twig\TemplateTwigExtension;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

return static function (ContainerConfigurator $container) {
    $services = $container->services()
        ->defaults()->private();

    $services
        ->set(Utils::class)->public()

        //Twing extensions
        ->set(TemplateTwigExtension::class)
        ->arg(0, service(ParameterBagInterface::class))
        ->tag('twig.extension');
};
