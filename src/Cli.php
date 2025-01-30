<?php

namespace Espaguette\Cli;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Exception;

class Cli extends Command
{
    protected static $defaultName = 'espaguette';
    protected $commands = [];

    public function __construct()
    {
        parent::__construct();
        $this->loadCommands();
    }

    protected function configure()
    {
        $this->setName('espaguette')
             ->setDescription('Execute comandos configurados no espaguette.json');
    }

    protected function loadCommands()
    {
        $configFile = getcwd() . '/espaguette.json';
        if (!file_exists($configFile)) {
            throw new Exception("espaguette.json not found in the root directory.");
        }

        $config = json_decode(file_get_contents($configFile), true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception("Invalid JSON in espaguette.json.");
        }

        $this->commands = $config;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $helper = $this->getHelper('question');

        $choices = [];
        foreach ($this->commands as $command => $description) {
            $choices[$command] = "$command - $description"; // Combine command and description
        }

        $question = new ChoiceQuestion(
            'Select a command to execute:',
            array_values($choices)
        );
        $question->setErrorMessage('Invalid option: %s');

        $selectedOption = $helper->ask($input, $output, $question);

        $selectedCommand = array_search($selectedOption, $choices);

        $output->writeln("Executing: <comment>$selectedCommand</comment>");
        shell_exec($selectedCommand);

        return Command::SUCCESS;
    }
}