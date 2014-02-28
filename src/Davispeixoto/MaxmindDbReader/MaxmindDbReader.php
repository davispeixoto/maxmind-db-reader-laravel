<?php namespace Davispeixoto\MaxmindDbReader;

use MaxMind\Db\Reader;

class MaxmindDbReader {
	
	protected static $reader;
	
	public function __construct($db_file)
	{
		self::$reader = new Reader($db_file);
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