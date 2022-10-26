<?php
# 2016-11-19
namespace Dfe\BlackbaudNetCommunity;
# Аргумент $s для методов этого класса не нужен,
# потому что опции этого класса считывается только на витрине для текущего магазина.
/** @method static Settings s() */
final class Settings extends \Df\Sso\Settings {
	/**
	 * 2016-11-19
	 * @return string
	 */
	function privateKey() {return $this->p();}

	/**
	 * 2016-11-20
	 * @return string
	 */
	function url() {return $this->v();}

	/**
	 * 2016-11-19
	 * @override
	 * @see \Df\Config\Settings::prefix()
	 * @used-by \Df\Config\Settings::v()
	 */
	protected function prefix():string {return 'df_sso/blackbaudNetCommunity';}
}