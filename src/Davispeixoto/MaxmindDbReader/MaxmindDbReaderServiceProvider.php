<?php namespace Davispeixoto\MaxmindDbReader;

use Illuminate\Support\ServiceProvider;
use Config;

class MaxmindDbReaderServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('davispeixoto/maxmind-db-reader');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['maxmind-db-reader'] = $this->app->share(function($app) {
			return new MaxmindDbReader(Config::get('maxmind-db-reader:db_file'));
		});
		
		$this->app->booting(function() {
			$loader = \Illuminate\Foundation\AliasLoader::getInstance();
			$loader->alias('MaxmindDbReader', 'Davispeixoto\MaxmindDbReader\Facades\MaxmindDbReader');
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('maxmind-db-reader');
	}

}