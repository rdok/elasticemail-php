# ElasticEmailPHP 
[![Build Status](https://travis-ci.org/rdok/elasticemail-php.svg?branch=master)](https://travis-ci.org/rdok/elasticemail-php)  
  
ElasticEmailPHP is a PHP Library for interacting with [Elastic Email platform API](http://api.elasticemail.com/public/help).

## Example
```
        $elasticEmail = new \ElasticEmail\ElasticEmailV2('your_elastic_api_key');

        $this->elasticEmail->email()->send([
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

