# Laravel Ininal Package

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

- [Documentation](#introduction)
- [Usage](#usage)
- [Support](#support)

<a name="introduction"></a>

## Documentation

The documentation for the package can be viewed by clicking the following link:

[https://developer.ininal.com/](https://developer.ininal.com/)

<a name="usage"></a>

## Usage

Following are some ways through which you can access the ininal provider:

```php
// Import the class namespaces first, before using it directly
use ErdalDemirci\Ininal\Services\Ininal as IninalClient;

$provider = new IninalClient;

// Through facade. No need to import namespaces
$provider = \Ininal::setProvider();
```

<a name="usage-ininal-api-configuration"></a>

## Configuration File

The configuration file **ininal.php** is located in the **config** folder. Following are its contents when published:

```php
return [
    'mode'          => env('ININAL_MODE', 'sandbox'), // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
    'api_key'       => env('ININAL_API_KEY', ''),
    'api_secret'    => env('ININAL_API_SECRET', ''),
    'locale'        => env('ININAL_LOCALE', 'TR'), // force gateway language  i.e. TR, EN
];
```

## Override Ininal API Configuration

You can override Ininal API configuration by calling `setApiCredentials` method:

```php
$provider->setApiCredentials($config);
```

<a name="usage-ininal-get-access-token"></a>

## Get Access Token

After setting the Ininal API configuration by calling `setApiCredentials` method. You need to get access token before
performing any API calls

```php
$provider->accessToken();
```

<a name="usage-helpers"></a>

### User Creation

```php
$response = $provider->userCreation(['name'=>'Ahmet','surname'=>'Ozperson','email'=>'ahmet@ahmet.com','gsmNumber'=>'5330000000','tcIdentificationNumber'=>'91111111119'
,'password'=>'123qweasd','birthDate'=>'1982-04-03','motherMaidenName'=>'yilmaz']);
```

```json
{
  "httpCode": 201,
  "description": "string",
  "response": {
    "userToken": "0014c0b5-6bf0-467f-bbf4-7a100b06927e"
  },
  "validationErrors": {
    "property1": "string",
    "property2": "string"
  }
}
```
### User information

```php
$response = $provider->userInformation($user_token = '0014c0b5-6bf0-467f-bbf4-7a100b06927e');
```

```json
{
  "httpCode": 200,
  "description": "string",
  "response": {
    "userToken": "0014c0b5-6bf0-467f-bbf4-7a100b06927e",
    "name": "Ahmet",
    "surname": "Ozperson",
    "email": "ahmet.ozperson@ininal.com",
    "gsmNumber": "5500000000",
    "tckn": "11111111111",
    "birthdate": "1992-05-26",
    "status": "ACTIVE"
  },
  "validationErrors": {
    "property1": "string",
    "property2": "string"
  }
}
```

<a name="support"></a>

## Support

This version supports Laravel 6 or greater.

* In case of any issues, kindly create one on the [Issues](https://github.com/erdaldemirci/laravel-ininal/issues)
  section.
* If you would like to contribute:
    * Fork this repository.
    * Implement your features.
    * Generate pull request.
 
