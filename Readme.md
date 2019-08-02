# TYPO3 CMS  - Request Factory Client Middleware Logging

The TYPO3 CMS uses the internal Request Factory to initiate the Guzzle client class. Guzzle has handlers and middlewares to define custom stuff. To log your HTTP requests or responses, you are able to register an additional Guzzle middlware to the HandlerStack of Guzzle. 

In the custom middleware you are able to log the requests to the TYPO3 core log files or create a custom logging destination. (see TYPO3 Logging Framework)

# Installation
`composer require jblocks/t3guzzlelog dev-master`
Activate the extension via the ExtensionManager in T3 Backend. 

# Usage (CLI)
Go to your console and execute `./bin/typo3 jblocks:t3guzzlelog`
Add a Xdebug breakpoint in the "ClientLogger" class.
