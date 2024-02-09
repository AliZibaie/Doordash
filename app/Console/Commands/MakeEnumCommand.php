<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Pluralizer;

class MakeEnumCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:enum {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make an enum class';
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }
    public function getSingularClassName($name)
    {
        return ucwords(Pluralizer::singular($name));
    }
    public function getStubPath()
    {
        return __DIR__ . '/../../../stubs/enum.stub';
    }
    public function getStubVariables()
    {
        return [
            'NAMESPACE'         => 'App\\Enums',
            'CLASS_NAME'        => $this->getSingularClassName($this->argument('name')),
        ];
    }
    public function getSourceFile()
    {
        return $this->getStubContents($this->getStubPath(), $this->getStubVariables());
    }
    public function getStubContents($stub , $stubVariables = [])
    {
        $contents = file_get_contents($stub);

        foreach ($stubVariables as $search => $replace)
        {
            $contents = str_replace('$'.$search.'$' , $replace, $contents);
        }

        return $contents;

    }
    public function getSourceFilePath()
    {
        return base_path('App\\Enums') .'\\' .$this->getSingularClassName($this->argument('name')) . '.php';
    }
    protected function makeDirectory($path)
    {
        if (! $this->files->isDirectory($path)) {
            $this->files->makeDirectory($path, 0777, true, true);
        }

        return $path;
    }
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $path = $this->getSourceFilePath();

        $this->makeDirectory(dirname($path));

        $contents = $this->getSourceFile();

        if (!$this->files->exists($path)) {
            $this->files->put($path, $contents);
            $this->info("File : {$path} created");
        } else {
            $this->info("File : {$path} already exits");
        }
    }
}
