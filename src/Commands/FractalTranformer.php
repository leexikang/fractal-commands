<?php
namespace Min\FractalCommands\Commands;

use Illuminate\Console\Command;

class FractalTranformer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "tranformer:create {tranformer} {--model=}";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create fractal tranformer';

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
        $class = $this->argument('tranformer');
        $model = $this->option('model');
        $data = compact('class', 'model');
        $path = "app/Api/Tranformer/";
        if(!file_exists($path)){
            $this->error($path . " doesn't exist");

        }
        $file = $path . $class . ".php";
        $fs = fopen($file, 'x');
        fwrite($fs, $this->loadTemplate($data));
        fclose($fs);
        
    }

    private function loadTemplate($data){

        $this->laravel->view->addNamespace('fractalcommands', substr(__DIR__, 0, -8) . 'views');
        return $this->laravel->view->make("fractalcommands::.generators.Tranformer")->with($data)->render();
    }
}
