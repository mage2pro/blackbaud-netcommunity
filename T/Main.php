<?php
namespace Dfe\BlackbaudNetCommunity\T;
// 2016-11-19
/** @method \Dfe\BlackbaudNetCommunity\Settings s() */
class Main extends \Df\Core\TestCase {
	/**
	 * 2016-11-19
	 */
	function t00() {}

	/**
	 * @test
	 * 2016-11-19
	 */
	function t01() {echo $this->s()->privateKey();}
}