<?php

$loader = require __DIR__ . '/vendor/autoload.php';
$loader->addPsr4('Examples\\', __DIR__);

use Omnipay\Gvp\Gateway;
use Examples\Helper;

$gateway = new Gateway();
$helper = new Helper();

try {
    $params = $helper->getAuthorizeParams();
    $response = $gateway->authorize($params)->send();

    $result = [
        'status' => $response->isSuccessful() ?: 0,
        'redirect' => $response->isRedirect() ?: 0,
        'message' => $response->getMessage(),
        'requestParams' => $response->getServiceRequestParams(),
        'response' => $response->getData()
    ];

    print("<pre>" . print_r($result, true) . "</pre>");
} catch (Exception $e) {
    throw new \RuntimeException($e->getMessage());
}
