<?php

namespace AssoConnect\DoctrineValidatorBundle\Tests\Functional\App;

use AssoConnect\DoctrineValidatorBundle\AssoConnectDoctrineValidatorBundle;
use AssoConnect\ValidatorBundle\AssoConnectValidatorBundle;
use Doctrine\Bundle\DoctrineBundle\DoctrineBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

class TestKernel extends Kernel
{
    /**
     * {@inheritdoc}
     */
    public function registerBundles()
    {
        return [
            new FrameworkBundle(),
            new AssoConnectDoctrineValidatorBundle(),
            new AssoConnectValidatorBundle(),
            new DoctrineBundle(),
        ];
    }

    public function __construct($environment, $debug)
    {
        parent::__construct($environment, $debug);
    }

    public function getCacheDir()
    {
        return $this->basePath() . 'cache/' . $this->environment;
    }

    public function getLogDir()
    {
        return $this->basePath() . 'logs';
    }

    public function getRootDir()
    {
        return __DIR__;
    }

    public function isBooted()
    {
        return $this->booted;
    }

    /**
     * {@inheritdoc}
     */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__ . '/config/config.yml');
    }

    private function basePath()
    {
        return sys_get_temp_dir() . '/AssoConnectDoctrineValidatorBundle/' . Kernel::VERSION . '/';
    }
}
