<?php namespace Davispeixoto\MaxmindDbReader;

use MaxMind\Db\Reader;

class MaxmindDbReader {
	
	protected static $reader;
	
	public function __construct($db_file)
	{
		if (extension_loaded('bcmath')) {
			self::$reader = new Reader($db_file);
		} else {
			throw new Exception('Maxmind DB Reader needs BC Math extension. Please install and/or enable it before using');
		}
	}
	
	public static function get($ipAddress)
	{
		return self::$reader->get($ipAddress);
	}
	
	public static function metadata()
	{
		return self::$reader->metadata();
	}
	
	public static function close()
	{
		self::$reader->close();
	}
}