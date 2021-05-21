# [Arsenal Webscrape](https://github.com/thulin82/arsenal_webscrape)

[![GitHub Actions](https://github.com/thulin82/arsenal_webscrape/actions/workflows/github-actions.yml/badge.svg)](https://github.com/thulin82/arsenal_webscrape/actions/workflows/github-actions.yml)

## Requirements

-   [PHP](http://php.net/) - The latest version of PHP is highly recommended
-   MySQL or similar dB

## SQL

### Tables

```SQL
CREATE TABLE `arsenal_time` (
  `timestamp` datetime,
  `game_time` int,
  `home` varchar,
  `away` varchar
);
CREATE TABLE `suspensions` (
  `timestamp` datetime
);
```

### User Data

Replace these variables in connect.php with your dB-info

```php
$mysql_server   = 'SERVER_NAME';
$mysql_user     = 'USER_NAME';
$mysql_password = 'USER_PASSWORD';
$mysql_database = 'DATABASE_NAME';
```

© Markus Thulin 2015-
