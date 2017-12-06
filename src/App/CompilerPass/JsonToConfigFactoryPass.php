<?php

declare(strict_types=1);

namespace App\CompilerPass;

use App\Service\JsonToConfig;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class JsonToConfigFactoryPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        // always first check if the primary service is defined
        if (!$container->has(JsonToConfig::class)) {
            return;
        }

        $definition = $container->findDefinition(JsonToConfig::class);

        // find all service IDs with the app.mail_transport tag
        $taggedServices = $container->findTaggedServiceIds('json2Config');

        $references = [];

        foreach (array_keys($taggedServices) as $id) {
            $references[] = new Reference($id);
        }

        $definition->setArgument(0, $references);
    }
}
