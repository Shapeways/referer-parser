<?php
namespace Shapeways\RefererParser\Tests\Config;

use Shapeways\RefererParser\Config\JsonConfigReader;

class JsonConfigReaderTest extends AbstractConfigReaderTest
{
    protected function createConfigReader($fileName)
    {
        return new JsonConfigReader($fileName);
    }
}
