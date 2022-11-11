<?php


namespace Safe;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;

class GenerateCommand extends Command
{
    protected function configure(): void
    {
        $this
            ->setName('generate')
            ->setDescription('Generates the PHP file with all functions.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $this->rmGenerated();
        // Let's build the DTD necessary to load the XML files.
        DocPage::buildEntities();
        $scanner = new Scanner(__DIR__ . '/../doc/doc-en/en/reference/');

        $paths = $scanner->getFunctionsPaths();

        $res = $scanner->getMethods($paths);
        $functions = $res->methods;
        $overloadedFunctions = $res->overloadedFunctions;

        $output->writeln('These functions have been ignored and must be dealt with manually: '.\implode(', ', $overloadedFunctions));

        $functionsDir = __DIR__ . '/../../generated/';
        $fileCreator = new FileCreator();
        $fileCreator->generatePhpFile($functions, $functionsDir);
        $fileCreator->generateFunctionsList($functions, $functionsDir . '/functionsList.php');
        $fileCreator->generateRectorFile($functions, __DIR__ . '/../../rector-migrate.php');

        $modules = [];
        foreach ($functions as $function) {
            $moduleName = $function->getModuleName();
            $modules[$moduleName] = $moduleName;
        }

        foreach ($modules as $moduleName => $foo) {
            $fileCreator->createExceptionFile((string) $moduleName);
        }

        $this->runCsFix($output);

        // Let's require the generated file to check there is no error.
        /*$files = \glob($functionsDir . '/*.php');
        if ($files === false) {
            throw new \RuntimeException('Failed to require the generated file');
        }

        foreach ($files as $file) {
            require($file);
        }*/

        $files = \glob($functionsDir . '/Exceptions/*.php');
        if ($files === false) {
            throw new \RuntimeException('Failed to require the generated exception file');
        }

        require_once __DIR__.'/../../vendor/autoload.php';
        foreach ($files as $file) {
            require($file);
        }

        // Finally, let's edit the composer.json file
        $output->writeln('Editing composer.json');
        ComposerJsonEditor::editComposerFileForGeneration(\array_values($modules));

        return 0;
    }

    private function rmGenerated(): void
    {
        $functionsDir = __DIR__ . '/../../generated/';
        $exceptions = \glob($functionsDir . '/Exceptions/*.php');
        if ($exceptions === false) {
            throw new \RuntimeException('Failed to require the generated exception files');
        }

        foreach ($exceptions as $exception) {
            \unlink($exception);
        }

        $files = \glob($functionsDir . '/*.php');
        if ($files === false) {
            throw new \RuntimeException('Failed to require the generated files');
        }

        foreach ($files as $file) {
            \unlink($file);
        }

        if (\file_exists(__DIR__.'/../doc/entities/generated.ent')) {
            \unlink(__DIR__.'/../doc/entities/generated.ent');
        }
    }

    private function runCsFix(OutputInterface $output): void
    {
        $process = new Process(['vendor/bin/phpcbf'], __DIR__.'/../..');
        $process->setTimeout(600);
        $process->run(function ($type, $buffer) use ($output) {
            if (Process::ERR === $type) {
                echo $output->write('<error>'.$buffer.'</error>');
            } else {
                echo $output->write($buffer);
            }
        });
    }
}