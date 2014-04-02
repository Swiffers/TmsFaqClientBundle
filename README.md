TmsFaqClientBundle
============================

Symfony2 bundle client for TmsFaqBundle

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

### Step 4: How to use it ?
With this API, you can:
- get all faqs
- get a faq by its customer_id
- post an evaluation on response
- post a consumerSearch

In this example, we would like to retrieve a faq by its customer id

1- create HttpClient/FaqApi.php
Example :
``` yaml
<?php
namespace Tms\WebAdminBundle\HttpClient;

use Da\ApiClientBundle\Http\Rest\RestApiClientBridge;
use Symfony\Component\HttpFoundation\Request;

/**
 * @author Danielle HODIEB <danielle.hodieb@tessi.fr>
 */
class FaqApi extends RestApiClientBridge
{
    /**
     * Instance of Request
     *
     * @var Request
     */
    protected $request;

    /**
     * Set request
     *
     * @param Request $request Instance of Request
     */
    public function setRequest (Request $request = null)
    {
        $this->request = $request;
    }

    /**
     * {@inheritDoc}
     */
    public function get($path, array $queryString = array())
    {
        if ($this->request instanceof Request) {

            //Add parameters required by the api
            $defaultQueryString = array(
                'host' => $this->request->getHttpHost(),
                'ip' => $this->request->getClientIp(),
            );

            $queryString = array_merge($defaultQueryString, $queryString);

            return parent::get($path, $queryString);
        }

        return '';
    }

    /**
     * {@inheritDoc}
     */
    public function post($path, array $queryString = array())
    {
        if ($this->request instanceof Request) {

            //Add parameters required by the api
            $defaultQueryString = array(
                'host' => $this->request->getHttpHost(),
                'ip' => $this->request->getClientIp(),
            );
            $queryString = array_merge($defaultQueryString, $queryString);
            return parent::post($path, $queryString);
        }

        return '';
    }
}
```
2- create Manager/FaqManager

``` yaml
<?php
namespace Tms\WebAdminBundle\Manager;

use Tms\Bundle\FaqClientBundle\Manager\FaqManager as BaseManager;

/**
 * @author Danielle HODIEB <danielle.hodieb@tessi.fr>
 */
class FaqManager extends BaseManager
{
}
```

3- create config files

- in Resources/config, create the files : managers.yml, services.yml
- in services.yml

``` yaml
parameters:
    tms_web_admin.api.faq.class: Tms\WebAdminBundle\HttpClient\FaqApi

services:
    tms_web_admin.api.faq:
        class: %tms_web_admin.api.faq.class%
        arguments: [ null, null ]
        calls:
            - [setRequest, ['@?request=']]
```

- in managers.yml, create a service for the faq : tms_web_admin.manager.faq, which take in argument the FaqManager

``` yaml
parameters:
    tms_web_admin.manager.faq.class: Tms\WebAdminBundle\Manager\FaqManager

services:
    tms_web_admin.manager.faq:

```

4- Dependency injection

- in your extension file of Dependency injection, not forget to load the file managers.yml

``` yaml
$loader->load('managers.yml');
$loader->load('services.yml');
```

5- Call the web service in your controller


Just call the faq manager  with the method findOneByCustomerId to get a faq

``` yaml
$faq = $this->get('tms_web_admin.manager.faq')->findOneByCustomerId(89);
```


How to use it
-------------

### Definition of the webservices

#### get Faqs

**Request**

| Route                    | Method | Parameters             | Header
|--------------------------|--------|------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------
| /api/faqs.json           | GET    |                        | Content-Type=json

**Response**

- *200 HTTP Status Code*

#### get a faq by its customer_id

**Request**

| Route                   | Method | Parameters             | Header
|-------------------------|--------|------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------
| /api/faqs/48.json       | GET    |                        | Content-Type=json


This will result to a :

- *200 HTTP Status Code*
- *404 Not found HTTP Status Code*

#### post an evaluation on a response

**Request**

| Route                   | Method | Parameters             | Header
|-------------------------|--------|------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------
| /api/evaluation.json    | POST   |   value                | Content-Type=json
|                         |        |   response_id          |
|                         |        |    user_id             |


This will result to a :

- *201  Created HTTP Status Code*
- *404

For a 201 HTTP Response code, you will "true" (in json format) in the response content.

#### post a consumer search for a response

**Request**

| Route                        | Method | Parameters                     |  Header
|------------------------------|--------|--------------------------------|----------------------------------------------------------------------------------------------------------------------------------------------------
| /api/consumerSearchs.json    | POST   |   answerFound (true or false   | Content-Type=json
|                              |        |   response_id                  |
|                              |        |    user_id


This will result to a :

- *201  Created HTTP Status Code*
- *404

For a 201 HTTP Response code, you will "true" (in json format) in the response content.
