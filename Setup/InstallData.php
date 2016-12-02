<?php
// 2016-12-02
namespace Dfe\BlackbaudNetCommunity\Setup;
class InstallData extends \Df\Sso\Install\Data {
	/**
	 * 2016-12-02
	 * @override
	 * @see \Df\Sso\Install\Data::labelPrefix()
	 * @used-by \Df\Sso\Install\Data::attribute()
	 * @return string
	 */
	protected function labelPrefix() {return 'Blackbaud NetCommunity';}

	/**
	 * 2016-12-02
	 * @override
	 * @see \Df\Framework\Install::initial()
	 * @used-by \Df\Framework\Install::isInitial()
	 * @return string
	 */
	protected function initial() {return '0.8.5';}
}