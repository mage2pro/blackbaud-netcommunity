<?php
// 2016-12-02
namespace Dfe\BlackbaudNetCommunity\Setup;
class UpgradeData extends \Df\Sso\Upgrade\Data {
	/**
	 * 2016-12-02
	 * @override
	 * @see \Df\Sso\Upgrade\Data::labelPrefix()
	 * @used-by \Df\Sso\Upgrade\Data::attribute()
	 * @return string
	 */
	protected function labelPrefix() {return 'Blackbaud NetCommunity';}

	/**
	 * 2016-12-02
	 * @override
	 * @see \Df\Framework\Upgrade::initial()
	 * @used-by \Df\Framework\Upgrade::isInitial()
	 * @return string
	 */
	protected function initial() {return '0.8.5';}
}