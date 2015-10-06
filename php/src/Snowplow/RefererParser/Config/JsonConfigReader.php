<?php
namespace Snowplow\RefererParser\Config;

class JsonConfigReader implements ConfigReaderInterface
{
    /** @var string */
    private $fileName;

    /** @var array */
    private $referers = array();

    public function __construct($fileName)
    {
        if (!file_exists($fileName)) {
            throw InvalidArgumentException::fileNotExists($fileName);
        }

        $this->fileName = $fileName;
    }

    private function read()
    {
        if ($this->referers) {
            return;
        }

        $hash = $this->parse(file_get_contents($this->fileName));

        foreach ($hash as $medium => $referers) {
            foreach ($referers as $source => $referer) {
                foreach ($referer['domains'] as $domain) {
                    $this->referers[$domain] = array(
                      'source'     => $source,
                      'medium'     => $medium,
                      'parameters' => isset($referer['parameters']) ? $referer['parameters'] : array(),
                    );
                }
            }
        }
    }

    public function lookup($lookupString)
    {
        $this->read();

        return isset($this->referers[$lookupString]) ? $this->referers[$lookupString] : null;
    }

//    use ConfigFileReaderTrait {
//        ConfigFileReaderTrait::init as public __construct;
//    }

    protected function parse($content)
    {
        return json_decode($content, true);
    }
}
