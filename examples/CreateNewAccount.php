<?php
// We first load in the composer autoloader.
require_once '../vendor/autoload.php';
use Ballen\Senitor\SenitorFactory;

/**
 * We'll load in the credentials from the _credentials.php file, so set them
 * here and they'll work across all the examples automatically!
 */
require_once '_credentials.php';

// Set custom cURL options such as ignore invalid SSL certs or forward proxy server config.
// See: http://guzzle.readthedocs.org/en/latest/clients.html#request-options
$http_options = [
    'verify' => false,
];

// An example of using the SentoraFactory class for quicker and simpler instantiation of the class.
$xmws_session = SenitorFactory::create($sentora['server'], $sentora['apikey'], $sentora['user'], $sentora['pass'], $http_options);

// Set the module that you want to communicate with.
$xmws_session->setModule('manage_clients');

// Set the Endpoint - this can also be 
$xmws_session->setEndpoint('CreateClient');

// Set the request data, for this we are going to create the user with the following data.
$xmws_session->setRequestData(
    [
        'resellerid' => 1,
        'username' => 'jbloggs',
        'packageid' => 1,
        'groupid' => 1,
        'fullname' => 'Joe Bloggs',
        'email' => 'jbloggs@example.com',
        'address' => '1 Example Street, London',
        'postcode' => 'N1 1AB',
        'phone' => '0121 123 4567',
        'password' => 'pass123',
        'sendemail' => false,
        'emailsubject' => '',
        'emailbody' => '',
]);

// Enable Debugging mode? - Will output the XML response from the Sentora server.
//$xmws_session->debugMode();
// Send the request and lets get the response object so we can use it to output our results.
$response = $xmws_session->send();

// For demonstration purposes lets just var_dump() the contents as an array...
var_dump($response->asArray());
