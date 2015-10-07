<?php
namespace Shapeways\RefererParser\Tests;

use Shapeways\RefererParser\Parser;

class DefaultParserTest extends AbstractParserTest
{
    protected function createParser(array $internalHosts = [])
    {
        return new Parser(null, $internalHosts);
    }
}
