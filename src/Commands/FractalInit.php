<?php

namespace Min\FractalCommands\Commands;

use Illuminate\Console\Command;

class FractalInit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fractal:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'intialize fractal structure';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->laravel->view->addNamespace('fractalcommands', substr(__Dir__, 0, -8).'views');
        $content = $this->laravel->view->make('fractalcommands::generators.ApiController')->render();
        $this->createApiDirectory();
        $this->createTranformerDirectory();
        $this->createApiController($content);
    }

    private function createDirectory($path){
        $dir = "app/" . $path;
        if(file_exists($dir)){
            $this->info("Directory " . $path . " already exist");

        }else{
            File::makeDirectory($dir);
        }
    }
    private function createApiController($content){
        $file =  "app/Http/Controllers/ApiController.php";
        if(file_exists($file)){
            $this->info($file . " exist");
        }else{
            $fs = fopen($file, 'x');
            fwrite($fs, $content);
            fclose($fx);

        }
    }
    private function createApiDirectory(){
        $this->createDirectory("/Api");
    }
    private function createTranformerDirectory(){
        $this->createDirectory("/Api/Tranformer");
    }
}
