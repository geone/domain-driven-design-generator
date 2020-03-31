<?php
namespace Geone\dddLaravelGenerator;

use Illuminate\Support\ServiceProvider;
use Geone\dddLaravelGenerator\Console\DDDGeneratorCommand;

/**
 * Class DDDLaravelGeneratorServiceProvider
 * @package Geone\dddLaravelGenerator
 */
class DDDLaravelGeneratorServiceProvider extends ServiceProvider {
	
	public function boot()
	{
		$this->publishes([
			__DIR__ . '/configs/dddLaravelGenerator.php' => config_path('dddLaravelGenerator.php'),
		]);
		if ($this->app->runningInConsole()) {

			$this->commands([
              DDDGeneratorCommand::class
			]);
		}
		
	}
	
	public function register()
	{
		$this->mergeConfigFrom(
			__DIR__ . '/configs/dddLaravelGenerator.php', 'dddLaravelGenerator'
		);
	}
}
?>