<?php

declare(strict_types=1);

namespace App\Command;

use JsonToConfig\JsonDetector;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Yaml\Yaml;

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

        $jsonDetector = $this->getService(JsonDetector::class);

        $data = $this->loadJsonFile($input->getArgument('file'));

        $config = $jsonDetector->detect($data, $input->getArgument('name'));

        $yaml = Yaml::dump($config->toArray(), 15, 2);
        file_put_contents($input->getArgument('file').'.yaml', $yaml);

        $io->writeln('Finished!');
    }

    protected function getService(string $name)
    {
        return $this->getContainer()->get($name);
    }

    protected function loadJsonFile(string $fileName): array
    {
        $fileContent = file_get_contents($fileName);

        return json_decode($fileContent, true);
    }
}
