# AssoConnectDoctrineValidatorBundle

[![Build status](https://gitlab.com/assoconnect/doctrine-validator-bundle/badges/master/build.svg)](https://gitlab.com/assoconnect/doctrine-validator-bundle/commits/master)
[![Overall test coverage](https://gitlab.com/assoconnect/doctrine-validator-bundle/badges/master/coverage.svg)](https://gitlab.com/assoconnect/doctrine-validator-bundle/pipelines)


This Symfony4 bundle provides the integration of [Symfony validation component](https://symfony.com/doc/current/validation.html) with [Doctrine entity custom type](https://www.doctrine-project.org/projects/doctrine-orm/en/2.6/cookbook/custom-mapping-types.html) to avoid duplicate code for the following types:
- bic
- boolean
- date
- datetime
- email
- float
- latitude
- longitude
- iban
- integer
- money
- percent
- phone (both landline & mobile)
- string
- text
- uuid
- uuid_binary_ordered_time

It also supports nullable and non-nullable fields.

It uses validators from Symfony and [AssoConnect\ValidatorBundle](https://gitlab.com/assoconnect/validator-bundle). 

[How to use](Resources/doc/index.md)
