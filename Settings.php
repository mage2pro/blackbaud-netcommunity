<?php
// 2016-11-19
namespace Dfe\BlackbaudNetCommunity;
use Magento\Framework\App\ScopeInterface as S;
use Magento\Store\Model\Store;
/** @method static Settings s() */
final class Settings extends \Df\Core\Settings {
	/**
	 * 2016-11-19
	 * @override
	 * @see \Df\Core\Settings::prefix()
	 * @used-by \Df\Core\Settings::v()
	 * @param null|string|int|S|Store $s [optional]
	 * @return string
	 */
	public function privateKey($s = null) {return $this->p($s);}

	/**
	 * 2016-11-19
	 * @override
	 * @see \Df\Core\Settings::prefix()
	 * @used-by \Df\Core\Settings::v()
	 * @return string
	 */
	protected function prefix() {return 'df_sso/blackbaudNetCommunity/';}
}