<?php
namespace Dfe\BlackbaudNetCommunity\Controller\Index;
use Df\Sso\CustomerReturn as _P;
// 2016-11-20
/** @final Unable to use the PHP «final» keyword here because of the M2 code generation. */
class Index extends _P {
	/**
	 * 2016-12-01
	 * @override
	 * @see _P::canRegister()
	 * @used-by _P::mc()
	 * @return bool
	 */
	protected function canRegister() {return false;}
}