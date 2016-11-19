<?php
// 2016-11-19
namespace Dfe\BlackbaudNetCommunity\T;
use Dfe\BlackbaudNetCommunity\Settings as S;
class Main extends \Df\Core\TestCase {
	/**
	 * 2016-11-19
	 */
	public function t00() {}

	/**
	 * @test
	 * 2016-11-19
	 */
	public function t01() {echo S::s()->privateKey();}
}