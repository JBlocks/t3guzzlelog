<?php declare(strict_types=1);

namespace JBLOCKS\T3Guzzlelog\Middleware\Guzzle;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
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
        $handler = new CurlHandler();
        $stack = HandlerStack::create($handler);

        return function (RequestInterface $request, array $options) use ($stack) {
            $this->logger->log(
                LogLevel::ERROR,
                'Requesting: ' . $request->getUri() . ' Options: ' . var_export($options, true)
            );
            return $stack($request, $options);
        };
    }
}
