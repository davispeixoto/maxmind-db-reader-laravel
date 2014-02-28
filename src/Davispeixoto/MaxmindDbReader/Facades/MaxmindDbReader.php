<?php namespace Davispeixoto\MaxmindDbReader\Facades;

use Illuminate\Support\Facades\Facade;

class MaxmindDbReader extends Facades {
	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() {
		return 'maxmind-db-reader';
	}
}