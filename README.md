# Tamara PHP SDK

Tamara PHP SDK is a wrapper for the Tamara API.

# Installation

Update `composer.json`

```yaml
"require": {
    "tamara-solution/php-sdk": "1.0.*"
}
```

# Usage

```php
$configuration = Configuration::create($apiUrl, $apiToken, $apiRequestTimeout, $transport);
$client = Client::create($configuration);

$response = $client->getPaymentTypes('SA');

if ($response->isSuccess()) {
    var_dump($response->getPaymentTypes());
}
```

### Notification Service
```php
$notification = \Tamara\Notification\NotificationService::create('token-key');
$message = $notification->processAuthoriseNotification();

var_dump($message->getOrderId());
var_dump($message->getOrderStatus());
var_dump($message->getData());
```

##### Symfony DI
```yaml
tamarapay.configuration:
    factory: ['Tamara\Configuration', create]
    arguments:
        - https://api.tamarapay.com
        - test_token
        
tamarapay.client:
    factory: ['Tamara\Client', create]
    arguments: ['@tamarapay.configuration']
```

# Notes
- We use [Guzzlehttp](http://docs.guzzlephp.org/en/stable/) library for the http client transport
- You can use your own transport service and just need to implement the `Psr\Http\Client\ClientInterface`
