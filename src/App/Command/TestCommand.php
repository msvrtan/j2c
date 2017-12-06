<?php

declare(strict_types=1);

namespace App\Command;

use App\Service\JsonToConfig;
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
            ->addArgument('file', InputArgument::REQUIRED, 'File to load');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $j2config = $this->getService(JsonToConfig::class);

        $data = $this->loadJsonFile($input->getArgument('file'));

        //print_r($data);

        $config = $j2config->createConfig($data);

        //print_r($config);

        $dump = [];

        foreach ($config as $key => $list) {
            $dump[$key] = [];
            foreach ($list as $item) {
                $dump[$key][] = get_class($item);
            }
        }

        $yaml = Yaml::dump($dump, 7, 2);
        file_put_contents('test.yaml', $yaml);

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
