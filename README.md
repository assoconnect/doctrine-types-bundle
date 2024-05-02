# AssoConnectDoctrineTypesBundle

[![Build Status](https://github.com/assoconnect/doctrine-types-bundle/actions/workflows/build.yml/badge.svg)](https://github.com/assoconnect/doctrine-types-bundle/actions/workflows/build.yml)
[![Coverage](https://sonarcloud.io/api/project_badges/measure?project=assoconnect_doctrine-types-bundle&metric=coverage)](https://sonarcloud.io/dashboard?id=assoconnect_doctrine-types-bundle)

This Symfony5 bundle provides the integration of [Symfony validation component](https://symfony.com/doc/current/validation.html) with [Doctrine entity custom type](https://www.doctrine-project.org/projects/doctrine-orm/en/2.6/cookbook/custom-mapping-types.html) to avoid duplicate code for the following types:
- [Amount](/src/Doctrine/DBAL/Types/AmountType.php)
- [AbsolutePercentValue](/src/Doctrine/DBAL/Types/AbsolutePercentValueType.php)
- [Bic](/src/Doctrine/DBAL/Types/BicType.php)
- [Country](/src/Doctrine/DBAL/Types/CountryType.php)
- [Currency](/src/Doctrine/DBAL/Types/CurrencyType.php)
- [Email](/src/Doctrine/DBAL/Types/EmailType.php)
- [FrenchRna](/src/Doctrine/DBAL/Types/FrenchRnaType.php)
- [FrenchSiren](/src/Doctrine/DBAL/Types/FrenchSirenType.php)
- [FrenchSiret](/src/Doctrine/DBAL/Types/FrenchSiretType.php)
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

It also supports nullable and non-nullable fields.
