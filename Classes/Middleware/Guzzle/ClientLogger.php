<?php declare(strict_types=1);

namespace JBLOCKS\T3Guzzlelog\Middleware\Guzzle;
use Psr\Http\Message\RequestInterface;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use TYPO3\CMS\Core\Log\LogLevel;

class ClientLogger implements LoggerAwareInterface
{
    use LoggerAwareTrait;
    /**
     * @return callable
     */
    public function handler(): callable
    {
        return function (callable $handler) {
            return function (RequestInterface $request, array $options) use ($handler) {
                $this->logger->log(
                    LogLevel::ERROR,
                    'hello world from: ' . __METHOD__
                );
                return $handler($request, $options);
            };
        };
    }
}
