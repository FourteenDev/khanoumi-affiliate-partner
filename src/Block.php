<?php

namespace KhanoumiAffiliatePartner;

use KhanoumiAffiliatePartner\Blocks\SliderBlock;

class Block
{

	public static $instance = null;

	public static function getInstance()
	{
		self::$instance === null && self::$instance = new self;
		return self::$instance;
	}

	public function __construct()
	{
		$this->register();
	}

	/**
	 * Registers Gutenberg blocks.
	 *
	 * @return	void
	 */
	public function register()
	{
		new SliderBlock();
	}
}
