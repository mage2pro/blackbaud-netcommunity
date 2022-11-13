<?php
namespace Dfe\BlackbaudNetCommunity\Setup;
# 2016-12-02
/** @final Unable to use the PHP «final» keyword here because of the M2 code generation. */
class UpgradeSchema extends \Df\Sso\Upgrade\Schema {
	/**
	 * 2016-12-02
	 * @override
	 * @see \Df\Framework\Upgrade::initial()
	 * @used-by \Df\Framework\Upgrade::isInitial()
	 */
	final protected function initial():string {return '0.8.5';}

	/**
	 * 2016-12-02
	 * @override
	 * @used-by \Df\Sso\Upgrade\Schema::_process()
	 * @see \Df\Sso\Upgrade\Schema::fId()
	 */
	final static function fId():string {return 'df_bbnc__id';}
}