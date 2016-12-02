<?php
// 2016-12-02
namespace Dfe\BlackbaudNetCommunity\Setup;
class InstallSchema extends \Df\Sso\Install\Schema {
	/**
	 * 2016-12-02
	 * @override
	 * @used-by \Df\Sso\Install\Schema::_process()
	 * @return string
	 */
	public static function fId() {return 'df_bbnc__id';}

	/**
	 * 2016-12-02
	 * @override
	 * @see \Df\Framework\Install::initial()
	 * @used-by \Df\Framework\Install::isInitial()
	 * @return string
	 */
	protected function initial() {return '0.8.5';}
}