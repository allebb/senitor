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
// See: http://guzzle.readthedocs.org/en/latest/clients.html#request-options
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
//$xmws_session->debugMode();

$xmws_session->setRequestData([]);

// Send the request and lets get the response object so we can use it to output our results.
$response = $xmws_session->send();

// See the entire response data as a stdClass.
var_dump($response->asObject());

// Lets generate a JSON representation of the response data.
var_dump($response->asJson());

// Return a specific status for a service (in this example, is the FTP server running?)
//var_dump($response->asObject()->portstatus->ftp);
