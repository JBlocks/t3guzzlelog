<?php declare(strict_types=1);

namespace JBLOCKS\T3Guzzlelog\Middleware\Guzzle;
use Psr\Http\Message\RequestInterface;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;

class ClientLogger implements LoggerAwareInterface
{
    use LoggerAwareTrait;
    /**
     * @return callable
     */
    public static function handler(): callable
    {
        return function (callable $handler) {
            return function (RequestInterface $request, array $options) use ($handler) {
                $requestedPath = $request->getUri()->getPath();

                $this->logger->log(
                    \TYPO3\CMS\Core\Log\LogLevel::CRITICAL,
                    $requestedPath
                );

            };
        };
    }
}
