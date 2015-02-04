<?php
// We first load in the composer autoloader.
require_once '../vendor/autoload.php';
use Ballen\Senitor\Senitor;
use Ballen\Senitor\Entities\Target;

/**
 * We'll load in the credentials from the _credentials.php file, so set them
 * here and they'll work across all the examples automatically!
 */
require_once '_credentials.php';

/**
 * An example of using Senitor to return the total domains hosted on the server.
 */
$xmws_session = new Senitor();

$xmws_session->setCredentials(new Target($session['server'], $session['user'], $session['pass'], $session['apikey']))
    ->setModule('domains')
    ->setEndpoint('GetAllDomains')
    ->setHttpOptions([
        'verify' => false,
    ]);

$xmws_session->debugMode();

$xmws_session->setRequestData([]);

$xmws_session->send();
