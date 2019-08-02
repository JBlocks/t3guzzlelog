<?php
defined('TYPO3_MODE') or die();

(static function (): void {

    $GLOBALS['TYPO3_CONF_VARS']['HTTP']['handler'][] =
        (\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\JBLOCKS\T3Guzzlelog\Middleware\Guzzle\ClientLogger::class))->handler();

})();
