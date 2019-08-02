<?php declare(strict_types=1);

namespace JBLOCKS\T3Guzzlelog\Command;

use JBLOCKS\T3Guzzlelog\Service\RequestUris;
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
     * @throws \Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output): ?int
    {
        $requestUris = GeneralUtility::makeInstance(ObjectManager::class)
            ->get(RequestUris::class);

        $requestUris->process();

        return 0;
    }
}
