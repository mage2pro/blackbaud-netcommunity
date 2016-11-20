<?php
// 2016-11-20
namespace Dfe\BlackbaudNetCommunity\Settings;
use Magento\Framework\App\ScopeInterface as S;
use Magento\Store\Model\Store;
/** @method static Button s() */
final class Button extends \Df\Core\Settings {
	/**
	 * 2016-11-20
	 * Параметр $s здесь не нужен,
	 * потому что опция считывается только на витрине для текущего магазина.
	 * @return string
	 */
	public function label() {return $this->v();}

	/**
	 * 2016-11-20
	 * @override
	 * @see \Df\Core\Settings::prefix()
	 * @used-by \Df\Core\Settings::v()
	 * @return string
	 */
	protected function prefix() {return 'df_sso/blackbaudNetCommunity/button/';}
}