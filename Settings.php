<?php
namespace Dfe\BlackbaudNetCommunity;
# 2016-11-19
# Аргумент $s для методов этого класса не нужен,
# потому что опции этого класса считывается только на витрине для текущего магазина.
/** @method static Settings s() */
final class Settings extends \Df\Sso\Settings {
	/**
	 * 2016-11-19
	 * @used-by \Dfe\BlackbaudNetCommunity\Customer::validate()
	 * @used-by \Dfe\BlackbaudNetCommunity\Test\Main::t01()
	 */
	function privateKey():string {return $this->p();}

	/**
	 * 2016-11-20
	 * @used-by \Dfe\BlackbaudNetCommunity\Url::get()
	 */
	function url():string {return $this->v();}

	/**
	 * 2016-11-19
	 * @override
	 * @see \Df\Config\Settings::prefix()
	 * @used-by \Df\Config\Settings::v()
	 */
	protected function prefix():string {return 'df_sso/blackbaudNetCommunity';}
}