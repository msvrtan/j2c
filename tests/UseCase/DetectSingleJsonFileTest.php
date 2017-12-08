<?php

declare(strict_types=1);

namespace Tests\UseCase;

use App\File\FileFactory;
use App\Service\JsonDetector;
use NullDevelopment\Skeleton\Php\Structure\ClassName;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Yaml\Yaml;
use Tests\TestCase\SfTestCase;

/**
 * @covers \App\Service\JsonDetector
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

        $config = $this->jsonDecoder->detect($data, $baseName, $namespace);

        $yaml = Yaml::dump($config->toArray(), 15, 2);

        $outputFileName = __DIR__.'/output/'.$inputFileName.'.yaml';

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
        $fileContent = file_get_contents(__DIR__.'/input/'.$fileName);

        return json_decode($fileContent, true);
    }
}
