TmsFaqClientBundle
============================

This bundle provide an easy API to call the faq API.

Installation
------------

The installation is a quick 4 steps process!

### Step 1: Composer

First, add these dependencies in your `composer.json` file:

```json
"repositories": [
    ...,
    {
        "type": "vcs",
        "url": "https://github.com/Tessi-Tms/TmsFaqClientBundle.git"
    }
],
"require": {
        ...,
        "da/api-client-bundle":        "dev-master",
        "tms/faq-client-bundle": "dev-master"
    },
```

Then, retrieve the bundles with the command:

```sh
composer update      # WIN
composer.phar update # LINUX
```

### Step 3: Kernel

Enable the bundles in your application kernel:

```php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Da\ApiClientBundle\DaApiClientBundle(),
        new Tms\Bundle\FaqClientBundle\TmsFaqClientBundle(),
    );
}
```

### Step 4: Configuration

Include bundle config file:

``` yaml
# app/config/config.yml

da_api_client:
    api:
        faq:
            endpoint_root:  %api.faq.endpoint_root%
            security_token: %api.faq.security_token%
            cache_enabled:  true
```

Set the parameters:

``` yaml
# app/config/parameters.yml.dist and app/config/parameters.yml

parameters:
    ...

    api.faq.endpoint_root: 'http://local.faq.com/api'       # the base url to the API
    api.faq.security_token: 3e90o0xrzy4gsw4k0440sw4k4g8oog0ckooe4 # your own authenticating token
```
