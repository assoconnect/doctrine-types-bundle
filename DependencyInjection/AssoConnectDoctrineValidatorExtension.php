<?php

namespace AssoConnect\DoctrineValidatorBundle\DependencyInjection;

use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\BicType;
use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\CountryType;
use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\EmailType;
use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\IbanType;
use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\LatitudeType;
use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\LocaleType;
use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\LongitudeType;
use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\MoneyType;
use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\PercentType;
use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\PhoneLandlineType;
use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\PhoneMobileType;
use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\PhoneType;
use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\TimezoneType;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

Class AssoConnectDoctrineValidatorExtension extends Extension implements PrependExtensionInterface
{
    public function prepend(ContainerBuilder $container)
    {
        $container->prependExtensionConfig('doctrine', [
            'dbal' => [
                'types' => [
                    'bic' => BicType::class,
                    'country' => CountryType::class,
                    'email' => EmailType::class,
                    'iban' => IbanType::class,
                    'latitude' => LatitudeType::class,
                    'locale' => LocaleType::class,
                    'longitude' => LongitudeType::class,
                    'money' => MoneyType::class,
                    'percent' => PercentType::class,
                    'phone' => PhoneType::class,
                    'phonelandline' => PhoneLandlineType::class,
                    'phonemobile' => PhoneMobileType::class,
                    'timezone' => TimezoneType::class,
                ],
                'mapping_types' => [
                    'bic' => 'string',
                    'country' => 'string',
                    'email' => 'string',
                    'iban' => 'string',
                    'latitude' => 'decimal',
                    'locale' => 'string',
                    'longitude' => 'decimal',
                    'money' => 'decimal',
                    'percent' => 'decimal',
                    'phone' => 'string',
                    'phonelandline' => 'string',
                    'phonemobile' => 'string',
                    'timezone' => 'string',
                ],
            ]
        ]);
    }

    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../Resources/config')
        );
        $loader->load('services.yaml');
    }
}