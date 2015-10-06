<?php
namespace Shapeways\RefererParser\Config;

interface ConfigReaderInterface
{
    /**
     * @param string $lookupString
     * @return array
     */
    public function lookup($lookupString);
}
