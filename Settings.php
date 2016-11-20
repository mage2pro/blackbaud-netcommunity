<?php
// 2016-11-19
namespace Dfe\BlackbaudNetCommunity;
use Magento\Framework\App\ScopeInterface as S;
use Magento\Store\Model\Store;
/** @method static Settings s() */
final class Settings extends \Df\Core\Settings {
	/**
	 * 2016-11-19
	 * Параметр $s здесь не нужен,
	 * потому что опция считывается только на витрине для текущего магазина.
	 * @return string
	 */
	public function privateKey() {return $this->p();}

	/**
	 * 2016-11-19
	 * @override
	 * @see \Df\Core\Settings::prefix()
	 * @used-by \Df\Core\Settings::v()
	 * @return string
	 */
	protected function prefix() {return 'df_sso/blackbaudNetCommunity/';}
}