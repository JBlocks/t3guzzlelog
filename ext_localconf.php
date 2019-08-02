<?php
defined('TYPO3_MODE') or die();

(static function (string $extKey): void {
    $GLOBALS['TYPO3_CONF_VARS'] = \array_replace_recursive(
        $GLOBALS['TYPO3_CONF_VARS'],
        [
            'HTTP' => [
                'handler' => [
                    100 => \JBLOCKS\T3Guzzlelog\Middleware\Guzzle\ClientLogger::class . '::handler'
                ]
            ]
        ]
    );
})('t3guzzlelog');
