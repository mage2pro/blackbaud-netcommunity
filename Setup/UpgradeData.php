<?php
namespace Dfe\BlackbaudNetCommunity\Setup;
# 2016-12-02
/** @final Unable to use the PHP «final» keyword here because of the M2 code generation. */
class UpgradeData extends \Df\Sso\Upgrade\Data {
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
	 * @see \Df\Sso\Upgrade\Data::labelPrefix()
	 * @used-by \Df\Sso\Upgrade\Data::attribute()
	 */
	final protected function labelPrefix():string {return 'Blackbaud NetCommunity';}
}