<?php
namespace Shapeways\RefererParser\Tests\Config;

use PHPUnit_Framework_TestCase as TestCase;
use Shapeways\RefererParser\Config\ConfigReaderInterface;

abstract class AbstractConfigReaderTest extends TestCase
{
    /** @return ConfigReaderInterface */
    abstract protected function createConfigReader($fileName);

    public function testExceptionIsThrownIfFileDoesNotExist()
    {
        $this->setExpectedException(
            'Shapeways\RefererParser\Exception\InvalidArgumentException',
            'File "INVALIDFILE" does not exist'
        );
        $this->createConfigReader('INVALIDFILE');
    }
}
