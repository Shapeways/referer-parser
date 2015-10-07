<?php
namespace Shapeways\RefererParser\Tests;

use Shapeways\RefererParser\Parser;

class DefaultParserTest extends AbstractParserTest
{
    protected function createParser(array $internalHosts = array())
    {
        return new Parser(null, $internalHosts);
    }
}
