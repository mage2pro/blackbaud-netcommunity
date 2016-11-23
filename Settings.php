<?php
// 2016-11-19
namespace Dfe\BlackbaudNetCommunity;
// Аргумент $s для методов этого класса не нужен,
// потому что опции этого класса считывается только на витрине для текущего магазина.
/** @method static Settings s() */
final class Settings extends \Df\Core\Settings {
	/**
	 * 2016-11-19
	 * @return string
	 */
	public function privateKey() {return $this->p();}

	/**
	 * 2016-11-20
	 * @return string
	 */
	public function url() {return $this->v();}

	/**
	 * 2016-11-19
	 * @override
	 * @see \Df\Core\Settings::prefix()
	 * @used-by \Df\Core\Settings::v()
	 * @return string
	 */
	protected function prefix() {return 'df_sso/blackbaudNetCommunity/';}
}