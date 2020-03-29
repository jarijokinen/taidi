# Taidi

Taidi is a [HTML Tidy](http://www.html-tidy.org/) plugin for WordPress. It
corrects and cleans up the HTML by fixing markup errors and upgrading legacy
code to modern standards (HTML5).  The output is finally pretty-printed with a
correct indentation.

Please don't use this plugin in production if you haven't set up proper caching
first, as HTML Tidy is very resource intensive.

## Requirements

* PHP 7.1 or greater
* [libtidy5](https://github.com/htacg/tidy-html5)
* php-tidy

## Installation

### Prerequisites on the server

APT:

    apt install libtidy5 libtidy-dev php-tidy

## Development

    npm install
    npm run docker  # and open https://localhost:8080
    gulp            # to make a zip

## License

MIT License. Copyright (c) 2020 [Jari Jokinen](https://jarijokinen.com). See
[LICENSE](https://github.com/jarijokinen/taidi/blob/master/LICENSE.txt)
for further details.
