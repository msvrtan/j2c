<?php

declare(strict_types=1);

namespace App\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class TestCommand extends ContainerAwareCommand
{
    protected static $defaultName = 'test:1';

    protected function configure()
    {
        $this
            ->setDescription('Test')
            ->addArgument('file', InputArgument::REQUIRED, 'File to load')
            ->addArgument('name', InputArgument::REQUIRED, 'Base name');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $io->writeln('Finished!');
    }

    protected function getService(string $name)
    {
        return $this->getContainer()->get($name);
    }
}
