<?php
namespace Shapeways\RefererParser\Tests;

use Shapeways\RefererParser\Config\JsonConfigReader;
use Shapeways\RefererParser\Parser;

class JsonParserTest extends AbstractParserTest
{
    protected function createParser(array $internalHosts = [])
    {
        return new Parser(new JsonConfigReader(__DIR__ . '/../../../../data/referers.json'), $internalHosts);
    }
}
