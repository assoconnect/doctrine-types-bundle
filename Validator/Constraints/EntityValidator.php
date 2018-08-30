<?php

namespace AssoConnect\DoctrineValidatorBundle\Validator\Constraints;

use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\LatitudeType;
use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\LongitudeType;
use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\MoneyType;
use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\PercentType;
use AssoConnect\ValidatorBundle\Validator\Constraints\Email;
use AssoConnect\ValidatorBundle\Validator\Constraints\FloatScale;
use AssoConnect\ValidatorBundle\Validator\Constraints\Latitude;
use AssoConnect\ValidatorBundle\Validator\Constraints\Longitude;
use AssoConnect\ValidatorBundle\Validator\Constraints\Money;
use AssoConnect\ValidatorBundle\Validator\Constraints\Percent;
use AssoConnect\ValidatorBundle\Validator\Constraints\Phone;
use AssoConnect\ValidatorBundle\Validator\Constraints\PhoneLandline;
use AssoConnect\ValidatorBundle\Validator\Constraints\PhoneMobile;
use AssoConnect\ValidatorBundle\Validator\Constraints\Timezone;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PropertyAccess\Exception\UnexpectedTypeException;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\Bic;
use Symfony\Component\Validator\Constraints\Country;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\Iban;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\LessThan;
use Symfony\Component\Validator\Constraints\Locale;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\Uuid;
use Symfony\Component\Validator\Constraints\Valid;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * @Annotation
 */
Class EntityValidator extends ConstraintValidator
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * {@inheritdoc}
     */
    public function validate($entity, Constraint $constraint)
    {

        $class = get_class($entity);
        $metadata = $this->em->getClassMetadata($class);
        $fields = array_keys($metadata->getReflectionProperties());
        $validator = $this->context->getValidator()->inContext($this->context);
        $propertyAccessor = PropertyAccess::createPropertyAccessor();

        foreach($fields as $field){

            $constraints = $this->getConstraints($class, $field);

            if($constraints){

                // PropertyAccessor will throw an exception if a null value is found on a path (ex: path is date.start but date is NULL)
                try{
                    $value = $propertyAccessor->getValue($entity, $field);
                }
                catch (UnexpectedTypeException $exception){
                    $value = null;
                }

                $validator->atPath($field)->validate($value, $constraints);
            }
        }
    }

    protected function getConstraintsForType(array $fieldMapping) :array
    {
        $constraints = [];

        switch($fieldMapping['type']){
            case 'bic':
                $constraints[] = new Bic();
                $constraints[] = new Regex('/^[0-9A-Z]+$/');
                break;
            case 'boolean':
                $constraints[] = new Type('bool');
                break;
            case 'country':
                $constraints[] = new Country();
                break;
            case 'date':
                $constraints[] = new Type(\DateTime::class);
                break;
            case 'datetime':
            case 'datetimetz':
            case 'datetimeutc':
                $constraints[] = new Type(\DateTime::class);
                break;
            case 'decimal':
                $constraints[] = new Type('float');
                $constraints[] = new GreaterThan(- pow(10, $fieldMapping['precision'] - $fieldMapping['scale']));
                $constraints[] = new LessThan(pow(10, $fieldMapping['precision'] - $fieldMapping['scale']));
                $constraints[] = new FloatScale($fieldMapping['scale']);
                break;
            case 'email':
                $constraints[] = new Email();
                $length = $fieldMapping['length'] ?? 255;
                $constraints[] = new Length(array('max' => $length));
                break;
            case 'float':
                $constraints[] = new Type('float');
                break;
            case 'iban':
                $constraints[] = new Iban();
                $constraints[] = new Regex('/^[0-9A-Z]+$/');
                break;
            case 'integer':
                $constraints[] = new Type('integer');
                break;
            case 'json':
                // TODO: implement JSON validation?
                break;
            case 'latitude':
                $constraints[] = new Latitude();
                $constraints[] = new FloatScale($fieldMapping['scale'] ? : LatitudeType::DEFAULT_SCALE);
                break;
            case 'locale':
                $constraints[] = new Locale();
                break;
            case 'longitude':
                $constraints[] = new Longitude();
                $constraints[] = new FloatScale($fieldMapping['scale'] ? : LongitudeType::DEFAULT_SCALE);
                break;
            case 'money':
                $constraints[] = new Money();
                $constraints[] = new FloatScale($fieldMapping['scale'] ? : MoneyType::DEFAULT_SCALE);
                break;
            case 'percent':
                $constraints[] = new Percent();
                $constraints[] = new FloatScale($fieldMapping['scale'] ? : PercentType::DEFAULT_SCALE);
                break;
            case 'phone':
                $constraints[] = new Phone();
                break;
            case 'phonelandline':
                $constraints[] = new PhoneLandline();
                break;
            case 'phonemobile':
                $constraints[] = new PhoneMobile();
                break;
            case 'string':
                $length = $fieldMapping['length'] ?? 255;
                $constraints[] = new Length(array('max' => $length));
                break;
            case 'text':
                $length = $fieldMapping['length'] ?? 65535;
                $constraints[] = new Length(array('max' => $length, 'charset' => '8bit'));
                break;
            case 'timezone':
                $constraints[] = new Timezone();
                break;
            case 'uuid':
            case 'uuid_binary_ordered_time':
                $constraints[] = new Uuid();
                break;
            default :
                throw new \DomainException('Unsupported field type: ' . $fieldMapping['type']);
                break;
        }

        return $constraints;
    }

    public function getConstraints(string $class, string $field) :array
    {
        $metadata = $this->em->getClassMetadata($class);

        $constraints = [];

        if(array_key_exists($field, $metadata->fieldMappings)){
            $fieldMapping = $metadata->fieldMappings[$field];

            // Nullable field
            if($fieldMapping['nullable'] === false){
                $constraints[] = [new NotNull()];
            }

            $constraints[] = $this->getConstraintsForType($fieldMapping);

            $constraints = call_user_func_array('array_merge', $constraints);
        }

        else if(array_key_exists($field, $metadata->embeddedClasses)){
            $constraints[] = new Valid();
        }

        else if(array_key_exists($field, $metadata->associationMappings)){
            $fieldMapping = $metadata->associationMappings[$field];

            if($fieldMapping['isOwningSide']){
                // Nullable field
                if(
                    isset($fieldMapping['joinColumns'][0]['nullable'])
                    && $fieldMapping['joinColumns'][0]['nullable'] === false

                ){
                    $constraints[] = new NotNull();
                }


                $constraints[] = new Type($fieldMapping['targetEntity']);
            }
        }

        else {
            throw new \LogicException('Unknown field: ' . $class  . '::$' . $field);
        }

        return $constraints;
    }

}