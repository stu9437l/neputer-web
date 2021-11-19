<?php

namespace Neputer\Utils\Generator\Console;

use Illuminate\Console\Command;
use Illuminate\Config\Repository as Config;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Filesystem\Filesystem as FileManager;
use Symfony\Component\Console\Input\InputOption;

/**
 * Class GenerateModuleCommand
 * @package Neputer\Utils\Generator\Console
 */
final class GenerateModuleCommand extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'neputer:generate';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate config, trait, service';

    /**
     * Repository config.
     *
     * @var $config
     */
    protected $config;

    /**
     * Filesystem Manager
     *
     * @var $fileManager
     */
    protected $fileManager;

    /**
     * GenerateModuleCommand constructor.
     * @param Config $config
     * @param FileManager $fileManager
     */
    public function __construct(Config $config, FileManager $fileManager)
    {
        $this->config       = $config;
        $this->fileManager  = $fileManager;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @throws \Exception
     */
    public function handle()
    {
        $this->checkingIfModuleIsCreatable();

        $structures = $this->config->get('generator.path');

        if ($structures && count($structures)) :
            foreach ($structures as $entity => $structure) :

                if ($entity !== 'controller_path') {
                    $structure = $this->getPath($structure);
                }

                $this->mkdir($structure);
            endforeach;
        endif;

        $this->initGenerator($structures);
    }

    /**
     * @param array $structures
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function initGenerator(array $structures)
    {
        $rootPath = $this->config->get('generator.root_path', base_path('neputer'));

        if ($this->option('config')) :
            $this->generateConfig($this->resolvePath($rootPath, $structures['config_path'] ?? ''));
        endif;
        if ($this->option('request')) :
            $this->generateRequests($this->resolvePath($rootPath, $structures['request_path'] ?? ''));
        endif;
        if ($this->option('views')) :
            $this->generateViews();
        endif;
        if ($this->option('services')) :
            $this->generateService($this->resolvePath($rootPath, $structures['service_path'] ?? ''));
        endif;
        if ($this->option('trait')) :
            $this->generateTrait($this->resolvePath($rootPath, $structures['trait_path'] ?? ''));
        endif;
        if ($this->option('controller')) :
            $this->generateMCR($rootPath);
        endif;
        if ($this->option('observer')) :
            $this->generateObserver($this->resolvePath($rootPath, $structures['observer_path'] ?? ''));
        endif;
        if (
            $this->option('trait') || $this->option('config') || $this->option('controller') ||
            $this->option('request') || $this->option('services') || $this->option('views') || $this->option('observer')
        ) {
            $this->info('All operations completed successfully !');
            die;
        }
        $this->generateService($this->resolvePath($rootPath, $structures['service_path'] ?? ''));
        $this->generateMCR($rootPath);
        $this->generateRequests($this->resolvePath($rootPath, $structures['request_path'] ?? ''));
        $this->generateViews();
    }

    /**
     * @param string $rootPath
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function generateMCR(string $rootPath)
    {
        $controllerPath  = $this->config->get('generator.path.controller_path');
        $className = $this->resolveClassName();
        $modelPath = $this->resolvePath($rootPath, $this->config->get('generator.path.model_path') ?? '');
        $this->makeFile($controllerPath.$className.'Controller.php', $this->resolveStub('controller',$this->resolveArgs($className)));
        $this->makeFile($modelPath.$className.'.php', $this->resolveStub('model', [
            '{CLASS_NAME}'     => $className,
            '{VAR_CLASS_NAME}' => '$'.strtolower($className),
        ]));
        $this->info('Generator has successfully generated the Model and Controller for you.');
    }

    /**
     * @param string $rootPath
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function generateRequests(string $rootPath)
    {
        $className = $this->resolveClassName();
        $this->mkdir($rootPath.$className);
        $rootPath = $rootPath.$className.DIRECTORY_SEPARATOR;

        $this->makeFile($rootPath.'StoreRequest.php', $this->resolveStub('storerequest', ['{CLASS_NAME}' => $className]));
        $this->makeFile($rootPath.'UpdateRequest.php', $this->resolveStub('updaterequest', ['{CLASS_NAME}' => $className]));

        $this->info('Generator has successfully generated the requests for you.');
    }

    /**
     * @param string $rootPath
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function generateTrait(string $rootPath)
    {
        $className = $this->resolveClassName();
        $this->makeFile($rootPath.$className.'Trait.php', $this->resolveStub('trait', ['{CLASS_NAME}' => $className]));
        $this->info('Generator has successfully generated the trait for you.');
    }

    /**
     * @param string $rootPath
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function generateObserver(string $rootPath)
    {
        $className = $this->resolveClassName();
        $this->makeFile($rootPath.$className.'Observer.php', $this->resolveStub('observer', ['{CLASS_NAME}' => $className]));
        $this->info('Generator has successfully generated the observer for you.');
    }

    /**
     * @param string $rootPath
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function generateConfig(string $rootPath)
    {
        $className = $this->resolveModule();
        $this->makeFile($rootPath.$className.'.php', $this->resolveStub('config', ['{CLASS_NAME}' => $className]));
        $this->info('Generator has successfully generated the config for you.');
    }

    /**
     * @param string $rootPath
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function generateService(string $rootPath)
    {
        $className = $this->resolveClassName();
        $this->makeFile($rootPath.$className.'Service.php', $this->resolveStub('service', [
            '{CLASS_NAME}'     => $className,
            '{VAR_CLASS_NAME}' => '$'.strtolower($className),
        ]));
        $this->info('Generator has successfully generated the service for you.');
    }

    /**
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function generateViews()
    {
        $rootPath  = $this->config->get('generator.base_view_path').DIRECTORY_SEPARATOR;
        $className = $this->resolveModule();

        $view_structures = $this->config->get('generator.view_structures');
        $extension = '.blade.php';

        foreach ($view_structures as $key => $structure) :
            $folder = $rootPath.$className.DIRECTORY_SEPARATOR;
            $this->mkdir($folder.'partials');
            $this->makeFile($folder.$structure.$extension, $this->resolveStub('views'.DIRECTORY_SEPARATOR.$key.'.blade', $this->resolveArgs($className)));
        endforeach;
        $this->info('Generator has successfully generated the views for you.');
    }

    /**
     * @param $file
     * @param null $template
     * @param bool $assets
     */
    protected function makeFile($file, $template = null, $assets = false)
    {
        if ( ! $this->fileManager->exists($file))
        {
            $content = $assets ? $this->getAssetsPath($file, true) : $file;
            $this->fileManager->put($content, $template);
        }
    }

    /**
     * @param $path
     * @param bool $absolute
     * @return string
     */
    protected function getAssetsPath($path, $absolute = true)
    {
        $rootPath = $this->config->get('generator.assets_path', 'assets/themes');
        if ($absolute)
            $rootPath = public_path($rootPath);

        if ($rootPath) {
            $this->mkdir($rootPath);
        }

        return $this->resolvePath($rootPath, $path);
    }

    /**
     * @param $file
     * @param null $template
     */
    protected function makeAssetsFile($file, $template = null)
    {
        $this->makeFile($file, $template, true);
    }

    /**
     * Checking if Module is creatable
     */
    protected function checkingIfModuleIsCreatable()
    {
        if (!$this->fileManager->isDirectory($this->getPath(null)))
        {
            $this->error(sprintf($this->resolveGeneratorExceptionMessage(), $this->resolveModule()));
            die;
        }
    }

    /**
     * @TODO
     * Class Name (sachinrai)
     * @return string
     */
    protected function resolveClassName()
    {
        return ucfirst($this->argument('name'));
    }

    /**
     * Resolve Module
     *
     * @return string
     */
    protected function resolveModule()
    {
        return strtolower($this->argument('name'));
    }

    /**
     * Get root writable path.
     *
     * @param  string $path
     * @return string
     */
    protected function getPath($path)
    {
        $rootPath = $this->config->get('generator.root_path', base_path('neputer'));
        if ($rootPath) {
            $this->mkdir($rootPath);
        }
        return $this->resolvePath($rootPath, $path);
    }

    /**
     * Make Directory
     *
     * @param $path
     */
    protected function mkdir($path)
    {
        if ( ! $this->fileManager->isDirectory($path))
        {
            $this->fileManager->makeDirectory($path, 0777, true);
        }
    }

    /**
     * @param $template
     * @param array $replacements
     * @return mixed|string
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function resolveStub($template, $replacements = [])
    {
        $path = realpath(__DIR__ . DIRECTORY_SEPARATOR .'stubs'.DIRECTORY_SEPARATOR . $template . '.stub');
        $content = $this->fileManager->get($path);
        if (!empty($replacements)) {
            $content = str_replace(array_keys($replacements), array_values($replacements), $content);
        }
        return $content;
    }

    /**
     * Resolve the path
     *
     * @param string $rootPath
     * @param $path
     * @return string
     */
    protected function resolvePath(string $rootPath, $path)
    {
        return $rootPath.DIRECTORY_SEPARATOR.$path.DIRECTORY_SEPARATOR;
    }

    protected function getArguments()
    {
        return array(
            array('name', InputArgument::REQUIRED, 'Name of the Module to be generated.'),
        );
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['trait', 't', InputOption::VALUE_NONE, 'Create a new trait for the given name'],

            ['config', 'c', InputOption::VALUE_NONE, 'Create a new config for the given name'],

            ['views', 'view', InputOption::VALUE_NONE, 'Generate the views for the given name'],

            ['services', 's', InputOption::VALUE_NONE, 'Generate the services for the given name'],

            ['request', 'r', InputOption::VALUE_NONE, 'Generate the requests for the given name'],

            ['controller', 'C', InputOption::VALUE_NONE, 'Generate the controller for the given name'],

            ['observer', 'o', InputOption::VALUE_NONE, 'Generate the observer for the given name'],
        ];
    }

    protected function resolveArgs($className)
    {
        return [
            '{CLASS_NAME}'      => $className,
            '{VAR_CLASS_NAME}'  => '$'.lcfirst($className),
            '{MODEL_NAMESPACE}' => '\\'.$this->config->get('generator.controller_namespace'),
            '{SMALL_CASE_CLASS_NAME}' => lcfirst($className),
            '{LOWER_CLASS_NAME}' => strtolower($className),
            '{Var_LOWER_CLASS_NAME}' => '$'.strtolower($className),
        ];
    }

    /**
     *
     * @return string
     */
    protected function resolveGeneratorExceptionMessage()
    {
        return '%s . Generator is enabled .';
    }

}
