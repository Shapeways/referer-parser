<?php
namespace Shapeways\RefererParser\Tests;

use Shapeways\RefererParser\Config\YamlConfigReader;
use Shapeways\RefererParser\Parser;

class YamlParserTest extends AbstractParserTest
{
    private static $reader;

    public static function setUpBeforeClass()
    {
        static::$reader = new YamlConfigReader(__DIR__ . '/../../../../data/referers.yml');
    }

    protected function createParser(array $internalHosts = [])
    {
        return new Parser(static::$reader, $internalHosts);
    }
}
