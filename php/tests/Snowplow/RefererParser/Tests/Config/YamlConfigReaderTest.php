<?php
namespace Shapeways\RefererParser\Tests\Config;

use Shapeways\RefererParser\Config\YamlConfigReader;

class YamlConfigReaderTest extends AbstractConfigReaderTest
{
    protected function createConfigReader($fileName)
    {
        return new YamlConfigReader($fileName);
    }
}
