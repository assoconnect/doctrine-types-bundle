<?php

namespace AssoConnect\DoctrineValidatorBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class AssoConnectDoctrineValidatorExtension extends Extension implements PrependExtensionInterface
{
    public function prepend(ContainerBuilder $container)
    {
        $container->prependExtensionConfig('doctrine', [
            'dbal' => [
                'mapping_types' => [
                    'bic' => 'string',
                    'country' => 'string',
                    'currency' => 'string',
                    'datetimetz' => 'datetime',
                    'datetimeutc' => 'datetime',
                    'email' => 'string',
                    'iban' => 'string',
                    'ip' => 'string',
                    'latitude' => 'decimal',
                    'locale' => 'string',
                    'longitude' => 'decimal',
                    'money' => 'decimal',
                    'percent' => 'decimal',
                    'phone' => 'string',
                    'phonelandline' => 'string',
                    'phonemobile' => 'string',
                    'postal' => 'string',
                    'timezone' => 'string',
                    'uuid_binary_ordered_time' => 'binary',
                ],
            ]
        ]);
    }

    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__ . '/../Resources/config')
        );
        $loader->load('services.yaml');
    }
}
