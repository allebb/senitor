<?php
// We first load in the composer autoloader.
require_once '../vendor/autoload.php';

/**
 * An example of using Senitor to check all domains that a user has on their
 * account.
 */
$xmws_session = new Ballen\Senitor\Senitor();