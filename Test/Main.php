<?php
namespace Dfe\BlackbaudNetCommunity\Test;
# 2016-11-19
/** @method \Dfe\BlackbaudNetCommunity\Settings s() */
final class Main extends \Df\Core\TestCase {
	/** 2016-11-19 */
	function t00():void {}

	/** 2016-11-19 @test */
	function t01():void {print_r($this->s()->privateKey());}
}