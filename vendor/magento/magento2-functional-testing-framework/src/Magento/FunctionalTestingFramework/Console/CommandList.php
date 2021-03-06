<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Magento\FunctionalTestingFramework\Console;

/**
 * Class CommandList has a list of commands.
 * @codingStandardsIgnoreFile
 * @SuppressWarnings(PHPMD)
 */
class CommandList implements CommandListInterface
{
    /**
     * List of Commands
     * @var \Symfony\Component\Console\Command\Command[]
     */
    private $commands;

    /**
     * Constructor
     *
     * @param array $commands
     */
    public function __construct(array $commands = [])
    {
        $this->commands = [
             'build:project' => new BuildProjectCommand(),
             'reset' => new CleanProjectCommand(),
             'generate:urn-catalog' => new GenerateDevUrnCommand(),
             'generate:suite' => new GenerateSuiteCommand(),
             'generate:tests' => new GenerateTestsCommand(),
             'run:test' => new RunTestCommand(),
             'run:group' => new RunTestGroupCommand(),
             'run:failed' => new RunTestFailedCommand(),
             'run:manifest' => new RunManifestCommand(),
             'setup:env' => new SetupEnvCommand(),
             'upgrade:tests' => new UpgradeTestsCommand(),
             'generate:docs' => new GenerateDocsCommand(),
             'static-checks' => new StaticChecksCommand()
        ] + $commands;
    }

    /**
     * {@inheritdoc}
     */
    public function getCommands()
    {
        return $this->commands;
    }
}
