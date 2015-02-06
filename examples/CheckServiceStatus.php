<?php
// We first load in the composer autoloader.
require_once '../vendor/autoload.php';
use Ballen\Senitor\SenitorFactory;

/**
 * We'll load in the credentials from the _credentials.php file, so set them
 * here and they'll work across all the examples automatically!
 */
require_once '_credentials.php';

/**
 * An example of using Senitor to check the current status of services and the
 * server uptime.
 */

// Set custom cURL options such as ignore invalid SSL certs or forward proxy server config.
$http_options = [
    'verify' => false,
];

// An example of using the SentoraFactory class for quicker and simpler instantiation of the class.
$xmws_session = SenitorFactory::create($sentora['server'], $sentora['apikey'], $sentora['user'], $sentora['pass'], $http_options);

// Set the module that you want to communicate with.
$xmws_session->setModule('services');

// Set the Endpoint - this can also be 
$xmws_session->setEndpoint('GetServiceStatus');

// Enable Debugging mode? - Will output the XML response from the Sentora server.
$xmws_session->debugMode();

$xmws_session->setRequestData([]);

// Send the request!
$xmws_session->send();
