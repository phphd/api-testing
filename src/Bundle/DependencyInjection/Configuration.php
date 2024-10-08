<?php

declare(strict_types=1);

namespace PhPhD\ApiTesting\Bundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\NodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder(PhdApiTestingExtension::ALIAS);

        /** @var ArrayNodeDefinition $rootNode */
        $rootNode = $treeBuilder->getRootNode();

        /** @psalm-suppress UnusedMethodCall */
        $rootNode
            ->children()
                ->append($this->authenticatorsDefinition())
            ->end()
        ;

        return $treeBuilder;
    }

    private function authenticatorsDefinition(): NodeDefinition
    {
        $treeBuilder = new TreeBuilder('jwt_authenticators');

        /** @var ArrayNodeDefinition $authenticatorsNode */
        $authenticatorsNode = $treeBuilder->getRootNode();

        /**
         * @psalm-suppress PossiblyNullReference
         * @psalm-suppress UndefinedInterfaceMethod
         *
         * @phpstan-ignore-next-line
         */
        return $authenticatorsNode
            ->isRequired()
            ->requiresAtLeastOneElement()
            ->useAttributeAsKey('name')
            ->arrayPrototype()
                ->children()
                    ->scalarNode('user_provider')
                        ->isRequired()
                    ->end()
                ->end()
            ->end()
        ;
    }
}
