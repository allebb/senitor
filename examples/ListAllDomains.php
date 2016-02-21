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

$xmws_session->setCredentials(new Target($sentora['server'], $sentora['user'], $sentora['pass'], $sentora['apikey']))
    ->setModule('domains')
    ->setEndpoint('GetAllDomains')
    ->setHttpOptions([
        'verify' => false,
    ]);

$xmws_session->setRequestData([]);

// We make the request to the server and return the response object.
$domains = $xmws_session->send();

// Check the repsonse output with a simple var_dump() call:
//var_dump($domains->asJson());
// Lets create an HTML table to contain our results.
$domains_html = "<h1>Domains</h1>"
    . "<table>"
    . "<tr><th>Domain ID</th><th>Domain name</th><th>Enabled?</th></tr>";

// Now we can iterate over each of the domains on the server:
foreach ($domains->asObject() as $domain) {

    // Check if the domain active?
    $enabled = 'No';
    if ($domain->active == "1") {
        $enabled = 'Yes';
    }

    // Output the HTML table row syntax
    $domains_html .= "<tr><td>{$domain->id}</td><td><a href=\"http://{$domain->domain}\" target=\"_blank\">{$domain->domain}</a></td><td>{$enabled}</td></tr>" . PHP_EOL;
}
$domains_html .= "</table>";

// Now lets print out the HTML table...
echo $domains_html;

