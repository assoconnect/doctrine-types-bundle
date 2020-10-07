# AssoConnectDoctrineTypesBundle

[![Build Status](https://travis-ci.org/assoconnect/doctrine-types-bundle.svg?branch=master)](https://travis-ci.org/assoconnect/doctrine-types-bundle)
[![Coverage](https://sonarcloud.io/api/project_badges/measure?project=assoconnect_doctrine-types-bundle&metric=coverage)](https://sonarcloud.io/dashboard?id=assoconnect_doctrine-types-bundle)

This Symfony4 bundle provides the integration of [Symfony validation component](https://symfony.com/doc/current/validation.html) with [Doctrine entity custom type](https://www.doctrine-project.org/projects/doctrine-orm/en/2.6/cookbook/custom-mapping-types.html) to avoid duplicate code for the following types:
- [Bic](/src/Doctrine/DBAL/Types/BicType.php)
- [Country](/src/Doctrine/DBAL/Types/CountryType.php)
- [Currency](/src/Doctrine/DBAL/Types/CurrencyType.php)
- [Email](/src/Doctrine/DBAL/Types/EmailType.php)
- [Iban](/src/Doctrine/DBAL/Types/IbanType.php)
- [Ip](/src/Doctrine/DBAL/Types/IpType.php)
- [Latitude](/src/Doctrine/DBAL/Types/LatitudeType.php)
- [Locale](/src/Doctrine/DBAL/Types/LocaleType.php)
- [Longitude](/src/Doctrine/DBAL/Types/LongitudeType.php)
- [Money](/src/Doctrine/DBAL/Types/MoneyType.php)
- [PhoneLandline](/src/Doctrine/DBAL/Types/PhoneLandlineType.php)
- [PhoneMobile](/src/Doctrine/DBAL/Types/PhoneMobileType.php)
- [Phone](/src/Doctrine/DBAL/Types/PhoneType.php)
- [Postal](/src/Doctrine/DBAL/Types/PostalType.php)
- [Timezone](/src/Doctrine/DBAL/Types/TimezoneType.php)
- [FrenchRna](/src/Doctrine/DBAL/Types/FrenchRnaType.php)
- [FrenchSiren](/src/Doctrine/DBAL/Types/FrenchSirenType.php)

It also supports nullable and non-nullable fields.
