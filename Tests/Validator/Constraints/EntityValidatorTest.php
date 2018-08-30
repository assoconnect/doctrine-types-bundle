<?php

namespace AssoConnect\DoctrineValidatorBundle\Tests\Validator\Constraints;

use AssoConnect\DoctrineValidatorBundle\Test\KernelTestCase;
use AssoConnect\DoctrineValidatorBundle\Tests\Functional\App\Entity\MyEmbeddable;
use AssoConnect\DoctrineValidatorBundle\Tests\Functional\App\Entity\MyEntity;
use AssoConnect\DoctrineValidatorBundle\Tests\Functional\App\Entity\MyEntityParent;
use AssoConnect\DoctrineValidatorBundle\Validator\Constraints\Entity;
use AssoConnect\DoctrineValidatorBundle\Validator\Constraints\EntityValidator;
use AssoConnect\ValidatorBundle\Validator\Constraints\Email;
use AssoConnect\ValidatorBundle\Validator\Constraints\Phone;
use AssoConnect\ValidatorBundle\Validator\Constraints\Timezone;
use Symfony\Component\Validator\Constraints\Bic;
use Symfony\Component\Validator\Constraints\Country;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;
use Symfony\Component\Validator\Constraints\Iban;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\LessThan;
use Symfony\Component\Validator\Constraints\LessThanOrEqual;
use Symfony\Component\Validator\Constraints\Locale;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\Uuid;
use Symfony\Component\Validator\ContainerConstraintValidatorFactory;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

Class EntityValidatorTest extends KernelTestCase
{

    /**
     * @var ValidatorInterface
     */
    protected $validator;

    public function setUp()
    {
        self::bootKernel();

        self::$container->get(EntityValidator::class);

        $validatorBuilder = Validation::createValidatorBuilder();
        $validatorBuilder->setConstraintValidatorFactory(new ContainerConstraintValidatorFactory(self::$container));

        $this->validator = $validatorBuilder->getValidator();
    }

    public function testValidValues()
    {
        $entity = new MyEntity();

        $entity->id = 123;
        $entity->bic = 'SOGEFRPP';
        $entity->boolean = true;
        $entity->country = 'FR';
        $entity->date = new \DateTime();
        $entity->datetime = new \DateTime();
        $entity->decimal = 99.999;
        $entity->email = 'foo@bar.com';
        $entity->float = 1.2;
        $entity->latitude = 2.3;
        $entity->locale = 'fr_FR';
        $entity->longitude = 3.4;
        $entity->iban = 'CH9300762011623852957';
        $entity->integer = 123;
        $entity->json = array();
        $entity->money = 4.5;
        $entity->nullable = 'oui';
        $entity->percent = 5.6;
        $entity->phone = '+33123456789';
        $entity->phonelandline = '+33123456789';
        $entity->phonemobile = '+33623456789';
        $entity->string = 'hello';
        $entity->text = 'world';
        $entity->timezone = 'Europe/Paris';
        $entity->uuid = '863c9c0f-59db-4ac7-9fd2-787c070b037c';
        $entity->uuid_binary_ordered_time = '6381fbe0-e651-46f5-b171-3f25518bd8e9';

        $entity->parentNullable = null;
        $entity->parentNotNullable = new MyEntityParent();

        $entity->embeddable = new MyEmbeddable(true);

        $errors = $this->validator->validate($entity, new Entity());
        foreach($errors as $error){
            var_dump($error->getPropertyPath() . ': ' . $error->getMessage());
        }
        $this->assertCount(0, $errors);
    }

    public function testInvalidValues()
    {
        $entity = new MyEntity();
        $codes = [];

        $codes['id'] = [NotNull::IS_NULL_ERROR];

        $entity->bic = 'SOGEFRPPA';
        $codes['bic'] = [Bic::INVALID_LENGTH_ERROR];

        $entity->boolean = 1;
        $codes['boolean'] = [Type::INVALID_TYPE_ERROR];

        $entity->country = 'Hello';
        $codes['country'] = [Country::NO_SUCH_COUNTRY_ERROR];

        $entity->date = 'hello';
        $codes['date'] = [Type::INVALID_TYPE_ERROR];

        $entity->datetime = 'world';
        $codes['datetime'] = [Type::INVALID_TYPE_ERROR];

        $entity->decimal = 100.0;
        $codes['decimal'] = [LessThan::TOO_HIGH_ERROR];

        $entity->email = 'foo@bar.comcom';
        $codes['email'] = [Email::INVALID_TLD_ERROR];

        $entity->float = 'a';
        $codes['float'] = [Type::INVALID_TYPE_ERROR];

        $entity->iban = 'CH9300762011623852958';
        $codes['iban'] = [Iban::CHECKSUM_FAILED_ERROR];

        $entity->integer = 'abc';
        $codes['integer'] = [Type::INVALID_TYPE_ERROR];

        $entity->json = array();
        // TODO: implement JSON validation?

        $entity->latitude = 91.0;
        $codes['latitude'] = [LessThanOrEqual::TOO_HIGH_ERROR];

        $entity->locale = 'foo';
        $codes['locale'] = [Locale::NO_SUCH_LOCALE_ERROR];

        $entity->longitude = 181.0;
        $codes['longitude'] = [LessThanOrEqual::TOO_HIGH_ERROR];

        $entity->money = -1;
        $codes['money'] = [GreaterThanOrEqual::TOO_LOW_ERROR];

        $entity->nullable = null;
        $codes['nullable'] = [NotNull::IS_NULL_ERROR];

        $entity->percent = -1;
        $codes['percent'] = [GreaterThanOrEqual::TOO_LOW_ERROR];

        $entity->phone = '+331234567890';
        $codes['phone'] = [Phone::PHONE_NUMBER_NOT_EXIST];

        $entity->phonelandline = '+33623456789';
        $codes['phonelandline'] = [Phone::INVALID_TYPE_ERROR];

        $entity->phonemobile = '+33123456789';
        $codes['phonemobile'] = [Phone::INVALID_TYPE_ERROR];

        $entity->string = str_repeat('a', 11);
        $codes['string'] = [Length::TOO_LONG_ERROR];

        $entity->text = str_repeat('💩', 3);
        $codes['text'] = [Length::TOO_LONG_ERROR];

        $entity->timezone = 'foo';
        $codes['timezone'] = [Timezone::NO_SUCH_TIMEZONE_ERROR];

        $entity->uuid = 'foo';
        $codes['uuid'] = [Uuid::INVALID_CHARACTERS_ERROR];

        $entity->uuid_binary_ordered_time = 'bar';
        $codes['uuid_binary_ordered_time'] = [Uuid::INVALID_CHARACTERS_ERROR];

        $entity->parentNullable = new MyEntity();
        $codes['parentNullable'] = [Type::INVALID_TYPE_ERROR];

        $entity->parentNotNullable = null;
        $codes['parentNotNullable'] = [NotNull::IS_NULL_ERROR];

        $entity->embeddable = new MyEmbeddable('hello');
        $codes['embeddable.bool'] = [Type::INVALID_TYPE_ERROR];

        $errors = $this->validator->validate($entity, new Entity());
        $errorsPerPath = [];
        foreach($errors as $error){
            $errorsPerPath[$error->getPropertyPath()][] = $error->getCode();
        }
        ksort($codes);
        ksort($errorsPerPath);
        $this->assertSame($codes, $errorsPerPath);
    }

}