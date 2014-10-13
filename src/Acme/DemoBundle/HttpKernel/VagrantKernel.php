<?php
namespace Acme\DemoBundle\HttpKernel;

use Symfony\Component\HttpKernel\Kernel;


/**
 *
 */
abstract class VagrantKernel extends Kernel
{
    /**
     * @var string
     */
    private $tempDir = null;

    /**
     * @param string $environment
     * @param bool   $debug
     */
    public function __construct($environment, $debug)
    {
        parent::__construct($environment, $debug);

        $envParameters = $this->getEnvParameters();
        if (array_key_exists('vagrant.env', $envParameters)) {
            $this->tempDir = sys_get_temp_dir() . '/' . $envParameters['vagrant.env'];
        }
    }

    public function getCacheDir()
    {
        if (!is_null($this->tempDir)) {
            return $this->tempDir . '/cache/' . $this->getEnvironment();
        }

        return parent::getCacheDir();
    }

    public function getLogDir()
    {
        if (!is_null($this->tempDir)) {
            return $this->tempDir . '/logs';
        }

        return parent::getLogDir();
    }

    /**
     * Gets the environment parameters.
     *
     * Only the parameters starting with "SYMFONY__" are considered.
     *
     * @return array An array of parameters
     */
    protected function getEnvParameters()
    {
        $parameters = array();

        foreach ($_SERVER as $key => $value) {
            if (0 === strpos($key, 'SYMFONY__')) {
                $parameters[strtolower(str_replace('__', '.', substr($key, 9)))] = $value === '~'?null:$value;
            }
        }

        return $parameters;
    }
}

