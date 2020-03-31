<?php
/**
 * Created by PhpStorm.
 * User: Tiago Gomes
 * Date: 15/03/2020
 * Time: 11:37
 */

namespace Geone\dddLaravelGenerator\Console;

use Geone\dddLaravelGenerator\Parcer\TemplateParcer;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

/**
 * Class DDDGeneratorCommand
 * @package geone\dddLaravelGenerator\Console
 */
class DDDGeneratorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DDDGenerator:build
                            {--d|domain= : The name of the Domain you would like to build, example: User, Invoice}
                            {--t|table= : The name of the Mysql Table you would like to query.}';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Domain Driven Design Laravel Building Blocks Generator.';
    
    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $domainName = $this->option('domain');
        if (empty($domainName)) {
            throw new Exception("--domain= is empty", 412);
        }
        
        $tableName = $this->option('table');
        if (empty($tableName)) {
            throw new Exception("--tableName= is empty", 412);
        }
        
        $folders = Config('dddLaravelGenerator.path');
        foreach ($folders as $k => $v) {
            if(!File::isDirectory($v)){
                $this->info('[+] - Creating folder :'.$v);
                File::makeDirectory($v, 0777, true, true);
            }
        }
    
        $this->create($domainName,'controllerPath');
        $this->create($domainName,'interface');
        $this->create($domainName,'repository', $tableName);
        $this->create($domainName,'domainModel');
        
        // todo: fix here!!!
        $this->create('AbstractDomain','abstractDomain');
    }
    
    /**
     * @param string $className
     * @param string $type
     * @param string|null $tableName
     */
    public function create(string $className, string $type, string $tableName=null) {
        $path = Config('dddLaravelGenerator.templates.'.$type);
        $output = file_get_contents($path);
        $parser = new TemplateParcer();
        $output = $parser->parce($className,$output,$tableName);
        if ($type=='abstractDomain') {
            file_put_contents(Config('dddLaravelGenerator.path.'.$type).Config('dddLaravelGenerator.fileSuffix.'.$type), $output);
        } else {
            file_put_contents(Config('dddLaravelGenerator.path.'.$type).$className.Config('dddLaravelGenerator.fileSuffix.'.$type), $output);
        }
    }
}