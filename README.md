# ElasticEmailPHP 
[![ci][ci_badge]][ci]
[![integration_tests][integration_tests_badge]][integration_tests]  
[![Packagaist][packagist_badge]][packagist]
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/386386ba-fbe5-4a50-a51c-07bfd7b3617f/mini.png)](https://insight.sensiolabs.com/projects/386386ba-fbe5-4a50-a51c-07bfd7b3617f)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/rdok/elasticemail-php/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/rdok/elasticemail-php/?branch=main)
  
ElasticEmailPHP is a PHP Library for interacting with [Elastic Email platform API](http://api.elasticemail.com/public/help).

### Usage
```php
$elasticEmail = new \ElasticEmail\ElasticEmail('your_elastic_api_key');

$elasticEmail->email()->send([
    'to'      => 'to_email',
    'subject' => 'subject',
    'from'    => 'from_email'
]);
```
> See [integration tests](https://github.com/rdok/elasticemail-php/tree/main/tests/Integration/Email) for more examples.

### Installation
Using [composer](https://getcomposer.org/download/)
```bash
composer require rdok/elasticemail-php
```

### Supported features
##### [Email](http://api.elasticemail.com/public/help#Email_header)
- [Send](http://api.elasticemail.com/public/help#Email_Send)
- [Status](http://api.elasticemail.com/public/help#Email_Status)


## Supported PHP versions
- 7.2
- 7.3
- 7.4
- 8.0

[packagist]: https://packagist.org/packages/rdok/elasticemail-php
[packagist_badge]: https://img.shields.io/badge/Packagist-grey?style=flat-square&logo=packagist
[ci]: https://github.com/rdok/elasticemail-php/actions/workflows/ci.yml
[ci_badge]: https://github.com/rdok/elasticemail-php/actions/workflows/ci.yml/badge.svg
[integration_tests]: https://github.com/rdok/elasticemail-php/actions/workflows/integration-tests.yml
[integration_tests_badge]: https://github.com/rdok/elasticemail-php/actions/workflows/integration-tests.yml/badge.svg
