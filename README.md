# referer-parser

Java/Scala: [![Build Status](https://travis-ci.org/snowplow/referer-parser.png)](https://travis-ci.org/snowplow/referer-parser)

referer-parser is a multi-language library for extracting marketing attribution data (such as search terms) from referer URLs, inspired by the [ua-parser] [ua-parser] project (an equivalent library for user agent parsing).

referer-parser is a core component of [Snowplow] [snowplow], the open-source web-scale analytics platform powered by Hadoop and Redshift.

_Note that we always use the original HTTP misspelling of 'referer' (and thus 'referal') in this project - never 'referrer'._

## Maintainers

* PHP: [Yuehlin Chung] [yuehlin] at Shapeways, Inc
* `referers.yml`: [Snowplow Analytics] [snowplow-analytics]

## Usage: PHP

The PHP version of this library uses the updated API, and identifies search, social, webmail, internal and unknown referers:

```php
use Snowplow\RefererParser\Parser;

$parser = new Parser();
$referer = $parser->parse(
    'http://www.google.com/search?q=gateway+oracle+cards+denise+linn&hl=en&client=safari',
    'http:/www.psychicbazaar.com/shop'
);

if ($referer->isKnown()) {
    echo $referer->getMedium(); // "Search"
    echo $referer->getSource(); // "Google"
    echo $referer->getTerm();   // "gateway oracle cards denise linn"
}
```

For more information, please see the PHP [README] [php-readme].

## referers.yml

referer-parser identifies whether a URL is a known referer or not by checking it against the [`referers.yml`] [referers-yml] file; the intention is that this YAML file is reusable as-is by every language-specific implementation of referer-parser.

The file is broken out into sections for the different mediums that we support:

* `unknown` for when we know the source, but not the medium
* `email` for webmail providers
* `social` for social media services
* `search` for search engines

Then within each section, we list each known provider (aka `source`) by name, and then which domains each provider uses. For search engines, we also list the parameters used in the search engine URL to identify the search `term`. For example:

```yaml
Google: # Name of search engine referer
  parameters:
    - 'q' # First parameter used by Google
    - 'p' # Alternative parameter used by Google
  domains:
    - google.co.uk  # One domain used by Google
    - google.com    # Another domain used by Google
    - ...
```

The number of referers and the domains they use is constantly growing - we need to keep `referers.yml` up-to-date, and hope that the community will help!

## Contributing

We welcome contributions to referer-parser:

1. **New search engines and other referers** - if you notice a search engine, social network or other site missing from `referers.yml`, please fork the repo, add the missing entry and submit a pull request
2. **Ports of referer-parser to other languages** - we welcome ports of referer-parser to new programming languages (e.g. Lua, Go, Haskell, C)
3. **Bug fixes, feature requests etc** - much appreciated!

**Please sign the [Snowplow CLA] [cla] before making pull requests.**

## Support

General support for referer-parser is handled by the team at Snowplow Analytics Ltd.

You can contact the Snowplow Analytics team through any of the [channels listed on their wiki] [talk-to-us].

## Copyright and license

`referers.yml` is based on [Piwik's] [piwik] [`SearchEngines.php`] [piwik-search-engines] and [`Socials.php`] [piwik-socials], copyright 2012 Matthieu Aubry and available under the [GNU General Public License v3] [gpl-license].

The PHP port is copyright 2013-2014 [Lars Strojny] [lstrojny] and is available under the [MIT License] [mit-license].

[ua-parser]: https://github.com/tobie/ua-parser

[snowplow]: https://github.com/snowplow/snowplow
[snowplow-analytics]: http://snowplowanalytics.com
[donspaulding]: https://github.com/donspaulding
[swijnands]: https://github.com/swijnands
[mkatrenik]: https://github.com/mkatrenik
[iperform]: http://www.iperform.nl/
[lstrojny]: https://github.com/lstrojny
[tsileo]: https://github.com/tsileo
[kreynolds]: https://github.com/kreynolds
[yuehlin]: https://github.com/yuehlin

[piwik]: http://piwik.org
[piwik-search-engines]: https://github.com/piwik/piwik/blob/master/core/DataFiles/SearchEngines.php
[piwik-socials]: https://github.com/piwik/piwik/blob/master/core/DataFiles/Socials.php

[ruby-readme]: https://github.com/snowplow/referer-parser/blob/master/ruby/README.md
[java-scala-readme]: https://github.com/snowplow/referer-parser/blob/master/java-scala/README.md
[python-readme]: https://github.com/snowplow/referer-parser/blob/master/python/README.md
[nodejs-readme]: https://github.com/snowplow/referer-parser/blob/master/nodejs/README.md
[dotnet-readme]: https://github.com/snowplow/referer-parser/blob/master/dotnet/README.md
[php-readme]: https://github.com/snowplow/referer-parser/blob/master/php/README.md
[go-readme]: https://github.com/snowplow/referer-parser/blob/master/go/README.md
[referers-yml]: https://github.com/snowplow/referer-parser/blob/master/resources/referers.yml

[talk-to-us]: https://github.com/snowplow/snowplow/wiki/Talk-to-us

[apache-license]: http://www.apache.org/licenses/LICENSE-2.0
[gpl-license]: http://www.gnu.org/licenses/gpl-3.0.html
[mit-license]: http://opensource.org/licenses/MIT
[cla]: https://github.com/snowplow/snowplow/wiki/CLA
