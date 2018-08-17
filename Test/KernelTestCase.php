<?php

namespace AssoConnect\DoctrineValidatorBundle\Test;

use AssoConnect\DoctrineValidatorBundle\Tests\Functional\App\TestKernel;
use Symfony\Component\Filesystem\Filesystem;

Class KernelTestCase extends \Symfony\Bundle\FrameworkBundle\Test\KernelTestCase
{

    /**
     * {@inheritdoc}
     */
    public static function setUpBeforeClass()
    {
        $fs = new Filesystem();
        $fs->remove(sys_get_temp_dir().'/AssoConnectDoctrineValidatorBundle/');
    }

    protected static function getKernelClass()
    {
        return TestKernel::class;
    }

}