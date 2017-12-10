<?php

declare(strict_types=1);

namespace Tests\UseCase;

use App\File\FileFactory;
use JsonToConfig\Config;
use JsonToConfig\JsonDetector;
use NullDevelopment\Skeleton\Php\Structure\ClassName;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Yaml\Yaml;
use Tests\TestCase\SfTestCase;

/**
 * @covers \JsonToConfig\JsonDetector
 * @group  usecase
 */
class DetectSingleJsonFileTest extends SfTestCase
{
    /** @var JsonDetector */
    private $jsonDecoder;

    public function setUp()
    {
        parent::setUp();
        $this->jsonDecoder = $this->getService(JsonDetector::class);
    }

    /**
     * @dataProvider provideInputFileNames
     */
    public function testDetection(string $inputFileName, string $baseName, string $namespace)
    {
        $data = $this->loadJsonFile($inputFileName);

        $config = new Config($baseName, $namespace, []);

        $config = $this->jsonDecoder->detect($config, $data);

        $yaml = Yaml::dump($config->toArray(), 15, 2);

        $outputFileName = __DIR__.'/json-config/'.$inputFileName.'.yaml';

        if (!is_file($outputFileName)) {
            file_put_contents($outputFileName, $yaml);
            $this->markTestIncomplete('Creating '.$outputFileName.' file!');
        } else {
            self::assertEquals(file_get_contents($outputFileName), $yaml);
        }
    }

    public function provideInputFileNames(): array
    {
        return [
            ['test.json', 'User', 'MyVendor'],
            ['test2.json', 'User', 'MyVendor'],
            ['test3.json', 'User', 'MyVendor'],
            ['test4.json', 'PullRequestHook', 'GitHub\\WebHook'],
            ['github-branch.json', 'Branch', 'GitHub'],
            ['github-branches.json', 'Branches', 'GitHub\\FFF'],
            ['github-commit-status.json', 'CommitStatus', 'GitHub'],
            ['github-commit.json', 'Commit', 'GitHub'],
            ['github-repo.json', 'Repo', 'GitHub'],
        ];
    }

    private function getFilePath(ClassName $className): string
    {
        return $this->getService(FileFactory::class)->getPath($className);
    }

    protected function writeFile(ClassName $className, $result)
    {
        $output = '<?php'.PHP_EOL.PHP_EOL.'declare(strict_types=1);'.PHP_EOL.PHP_EOL.str_replace("\t", '    ', $result);

        $fileName = $this->getFilePath($className);

        $this->getService(Filesystem::class)->dumpFile($fileName, $output);
    }

    protected function loadJsonFile(string $fileName): array
    {
        $fileContent = file_get_contents(__DIR__.'/json-input/'.$fileName);

        return json_decode($fileContent, true);
    }
}
