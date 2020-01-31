<?php
namespace Dfe\BlackbaudNetCommunity\Test;
// 2016-11-19
/** @method \Dfe\BlackbaudNetCommunity\Settings s() */
final class Main extends \Df\Core\TestCase {
	/** 2016-11-19 */
	function t00() {}

	/** * @test 2016-11-19 */
	function t01() {print_r($this->s()->privateKey());}
}