<?php declare(strict_types=1);

namespace JBLOCKS\T3Guzzlelog\Service;

use TYPO3\CMS\Core\Http\RequestFactory;

class RequestUris
{
    /**
     * @var RequestFactory
     */
    private $client;

    public function __construct(RequestFactory $client)
    {
        $this->client = $client;
    }

    public function process(): void
    {
        $url = 'https://typo3.org/';
        $this->client->request($url, 'GET');
    }
}
