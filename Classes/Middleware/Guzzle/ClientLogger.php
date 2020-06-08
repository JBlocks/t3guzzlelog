<?php declare(strict_types=1);

namespace JBLOCKS\T3Guzzlelog\Middleware\Guzzle;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use Psr\Http\Message\RequestInterface;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use TYPO3\CMS\Core\Log\LogLevel;
use TYPO3\CMS\Core\Log\LogManager;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class ClientLogger implements LoggerAwareInterface
{
    use LoggerAwareTrait;
    /**
     * @return callable
     */
    public function handler(): callable
    {
        $handler = new CurlHandler();
        $stack = HandlerStack::create($handler);

        return function (RequestInterface $request, array $options) use ($stack) {
            $this->logger->error(
                'Requesting: ' . $request->getUri(),
                $options
            );
            return $stack($request, $options);
        };
    }
}
