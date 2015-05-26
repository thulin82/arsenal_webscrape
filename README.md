# [Arsenal Webscrape](https://github.com/thulin82/arsenal_webscrape)
[![Build Status](https://travis-ci.org/thulin82/arsenal_webscrape.svg?branch=master)](https://travis-ci.org/thulin82/arsenal_webscrape)
[![Build Status](https://scrutinizer-ci.com/g/thulin82/arsenal_webscrape/badges/build.png?b=master)](https://scrutinizer-ci.com/g/thulin82/arsenal_webscrape/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/thulin82/arsenal_webscrape/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/thulin82/arsenal_webscrape/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/thulin82/arsenal_webscrape/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/thulin82/arsenal_webscrape/?branch=master)

## Requirements

* [PHP](http://php.net/) - The latest version of PHP is highly recommended
* MySQL or similar dB

## SQL

### Tables
```SQL
CREATE TABLE `arsenal_time` (
  `timestamp` datetime,
  `game_time` int,
  `home` varchar,
  `away` varchar
);
```
### User Data
Replace these varibales in connect.php with your dB-info
```php
$mysql_server   = 'SERVER_NAME';
$mysql_user     = 'USER_NAME';
$mysql_password = 'USER_PASSWORD';
$mysql_database = 'DATABASE_NAME';
```

© Markus Thulin 2015-
