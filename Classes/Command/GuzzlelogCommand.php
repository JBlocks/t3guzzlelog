<?php declare(strict_types=1);

namespace JBLOCKS\T3Guzzlelog\Command;

use ACME\Guzzlelog\Service\RequestUris;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;

class GuzzlelogCommand extends Command
{
    /**
     * Configures the current command.
     */
    protected function configure(): void
    {
        $this->setDescription(
            'Make a guzzle request'
        );
    }

    /**
     * Executes the current command.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null null or 0 if everything went fine, or an error code
     * @throws \TYPO3\CMS\Core\Error\Http\ServiceUnavailableException
     * @throws \Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output): ?int
    {
        $objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        $requestUris = $objectManager->get(RequestUris::class);

        $requestUris->process();

        return 0;
    }
}
