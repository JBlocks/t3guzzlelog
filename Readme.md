# TYPO3 CMS  - Request Factory Client Middleware Logging

The TYPO3 CMS uses the internal Request Factory to initiate the Guzzle client class. Guzzle has handlers and middlewares to define custom stuff. To log your HTTP requests or responses, you are able to register an additional Guzzle middlware to the HandlerStack of Guzzle. 

In the custom middleware you are able to log the requests to the TYPO3 core log files or create a custom logging destination. (see TYPO3 Logging Framework)

# Installation
`composer require jblocks/t3guzzlelog dev-master`
Activate the extension via the ExtensionManager in T3 Backend. 

# Usage (CLI)
Go to your console and execute `./bin/typo3 jblocks:t3guzzlelog`
Add a Xdebug breakpoint in the "ClientLogger" class.


#Examples

## Add custom middleware to default Guzzle handler stack
```
$GLOBALS['TYPO3_CONF_VARS']['HTTP']['handler'][] =
        (\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\ACME\Middleware\Guzzle\ACustomMiddleware::class))->handler();
$GLOBALS['TYPO3_CONF_VARS']['HTTP']['handler'][] =
        (\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\ACME\Middleware\Guzzle\ASecondCustomMiddleware::class))->handler();
```

## Overwrite the whole Guzzle middleware handler stack with custom class
```
# AdditionalConfiguration
GLOBALS['TYPO3_CONF_VARS']['HTTP']['handler'] = (\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\ACME\Middleware\Guzzle\HandlerStack::class))->handler();

# Class to overwrite the default Guzzle handlerstack
<?php
declare(strict_types=1);

namespace \ACME\Middleware\Guzzle;

class HandlerStack
{
    public function handler(): HandlerStack
    {
        $stack = \GuzzleHttp\HandlerStack::create()();
        $customHandler = (new MyCustomHandler())->foo();
        $stack->push($customHandler);

        return $stack;
    }
}
```
