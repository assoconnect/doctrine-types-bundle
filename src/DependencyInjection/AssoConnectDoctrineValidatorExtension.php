<?php

namespace AssoConnect\DoctrineValidatorBundle\DependencyInjection;

use ASM\Doctrine\DBAL\Types\DateTimeUTCType;
use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\BicType;
use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\CountryType;
use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\CurrencyType;
use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\EmailType;
use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\IbanType;
use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\IpType;
use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\LatitudeType;
use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\LocaleType;
use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\LongitudeType;
use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\MoneyType;
use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\PercentType;
use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\PhoneLandlineType;
use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\PhoneMobileType;
use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\PhoneType;
use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\PostalType;
use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\TimezoneType;
use Ramsey\Uuid\Doctrine\UuidBinaryOrderedTimeType;
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
                'types' => [
                    'bic' => BicType::class,
                    'country' => CountryType::class,
                    'currency' => CurrencyType::class,
                    'datetime' => DateTimeUTCType::class,
                    'datetimetz' => DateTimeUTCType::class,
                    'datetimeutc' => DateTimeUTCType::class,
                    'email' => EmailType::class,
                    'iban' => IbanType::class,
                    'ip' => IpType::class,
                    'latitude' => LatitudeType::class,
                    'locale' => LocaleType::class,
                    'longitude' => LongitudeType::class,
                    'money' => MoneyType::class,
                    'percent' => PercentType::class,
                    'phone' => PhoneType::class,
                    'phonelandline' => PhoneLandlineType::class,
                    'phonemobile' => PhoneMobileType::class,
                    'postal' => PostalType::class,
                    'timezone' => TimezoneType::class,
                    'uuid_binary_ordered_time' => UuidBinaryOrderedTimeType::class,
                ],
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
