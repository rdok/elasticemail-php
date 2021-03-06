# ElasticEmailPHP 
[![unit_tests][unit_tests_badge]][unit_tests]
[![integration_tests][integration_tests_badge]][integration_tests]

[![Coverage Status](https://coveralls.io/repos/github/rdok/elasticemail-php/badge.svg?branch=master)](https://coveralls.io/github/rdok/elasticemail-php?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/386386ba-fbe5-4a50-a51c-07bfd7b3617f/mini.png)](https://insight.sensiolabs.com/projects/386386ba-fbe5-4a50-a51c-07bfd7b3617f)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/rdok/elasticemail-php/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/rdok/elasticemail-php/?branch=master)
  
ElasticEmailPHP is a PHP Library for interacting with [Elastic Email platform API](http://api.elasticemail.com/public/help).

## Example
```php
$elasticEmail = new \ElasticEmail\ElasticEmailV2('your_elastic_api_key');

$elasticEmail->email()->send([
    'to'      => 'to_email',
    'subject' => 'subject',
    'from'    => 'from_email'
]);
```

## Installation
Using [composer](https://getcomposer.org/download/)
```bash
composer require rdok/elasticemail-php
```

## Supported PHP versions
- 7.2
- 7.3
- 7.4
- 8.0


[unit_tests]: https://github.com/rdok/elasticemail-php/actions/workflows/unit-tests.yml
[unit_tests_badge]: https://github.com/rdok/elasticemail-php/actions/workflows/unit-tests.yml/badge.svg
[integration_tests]: https://github.com/rdok/elasticemail-php/actions/workflows/integration-tests.yml
[integration_tests_badge]: https://github.com/rdok/elasticemail-php/actions/workflows/integration-tests.yml/badge.svg
