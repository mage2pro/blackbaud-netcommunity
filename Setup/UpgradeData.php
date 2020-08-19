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
	 * @return string
	 */
	final protected function initial() {return '0.8.5';}
	
	/**
	 * 2016-12-02
	 * @override
	 * @see \Df\Sso\Upgrade\Data::labelPrefix()
	 * @used-by \Df\Sso\Upgrade\Data::attribute()
	 * @return string
	 */
	final protected function labelPrefix() {return 'Blackbaud NetCommunity';}
}