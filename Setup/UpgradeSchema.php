<?php
// 2016-12-02
namespace Dfe\BlackbaudNetCommunity\Setup;
final class UpgradeSchema extends \Df\Sso\Upgrade\Schema {
	/**
	 * 2016-12-02
	 * @override
	 * @used-by \Df\Sso\Upgrade\Schema::_process()
	 * @return string
	 */
	static function fId() {return 'df_bbnc__id';}

	/**
	 * 2016-12-02
	 * @override
	 * @see \Df\Framework\Upgrade::initial()
	 * @used-by \Df\Framework\Upgrade::isInitial()
	 * @return string
	 */
	protected function initial() {return '0.8.5';}
}