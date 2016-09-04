# ElasticEmailPHP 
[![CircleCI](https://circleci.com/gh/rdok/elasticemail-php.svg?style=svg)](https://circleci.com/gh/rdok/elasticemail-php)
[![Coverage Status](https://coveralls.io/repos/github/rdok/elasticemail-php/badge.svg?branch=master)](https://coveralls.io/github/rdok/elasticemail-php?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/386386ba-fbe5-4a50-a51c-07bfd7b3617f/mini.png)](https://insight.sensiolabs.com/projects/386386ba-fbe5-4a50-a51c-07bfd7b3617f)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/rdok/elasticemail-php/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/rdok/elasticemail-php/?branch=master)
[![StyleCI](https://styleci.io/repos/60220382/shield)](https://styleci.io/repos/60220382)
  
ElasticEmailPHP is a PHP Library for interacting with [Elastic Email platform API](http://api.elasticemail.com/public/help).

## Example
```
$elasticEmail = new \ElasticEmail\ElasticEmailV2('your_elastic_api_key');

$elasticEmail->email()->send([
    'to'      => 'to_email',
    'subject' => 'subject',
    'from'    => 'from_email'
]);
```



Installation
------------
Using [composer](https://getcomposer.org/download/)
```bash
composer require rdok/elasticemail-php
```

