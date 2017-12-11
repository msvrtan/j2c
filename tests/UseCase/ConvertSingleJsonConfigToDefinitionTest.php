<?php

declare(strict_types=1);

namespace Tests\UseCase;

use ConfigToDefinition\ConfigConverter;
use NullDevelopment\Skeleton\Core\ObjectConfigurationLoaderCollection;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Yaml\Yaml;
use Tests\TestCase\SfTestCase;

/**
 * @group  usecase
 */
class ConvertSingleJsonConfigToDefinitionTest extends SfTestCase
{
    /** @var ObjectConfigurationLoaderCollection */
    private $loaders;
    /** @var ConfigConverter */
    private $configConverter;

    public function setUp()
    {
        parent::setUp();
        $this->configConverter = $this->getService(ConfigConverter::class);
        $this->loaders         = $this->getService(ObjectConfigurationLoaderCollection::class);
    }

    /**
     * @dataProvider provideInputFileNames
     */
    public function testDetection(string $inputFileName)
    {
        $fileSystem = new Filesystem();

        $input = $this->loadJsonConfig($inputFileName);

        $definitions = $this->configConverter->convert($input);

        $outputBasePath = __DIR__.'/yaml-config/'.$inputFileName.'/';

        foreach ($definitions as $definition) {
            $yaml = Yaml::dump($definition->toArray(), 15, 2);

            $fileName = $definition->getName()->getFullName().'.yaml';

            $fileName = str_replace('\\', '/', $fileName);

            $outputFileName = $outputBasePath.$fileName;

            $fileSystem->dumpFile($outputFileName, $yaml);
        }

        self::assertTrue(true);
    }

    public function provideInputFileNames(): array
    {
        return [
            ['test.json.yaml'],
            ['test2.json.yaml'],
            ['test3.json.yaml'],
            ['test4.json.yaml'],
            ['github-branch.json.yaml'],
            ['github-branches.json.yaml'],
            ['github-commit.json.yaml'],
            ['github-commit-status.json.yaml'],
            ['github-repo.json.yaml'],
        ];
    }

    protected function loadJsonConfig(string $fileName): array
    {
        $fileContent = file_get_contents(__DIR__.'/json-config/'.$fileName);

        return Yaml::parse($fileContent);
    }
}
