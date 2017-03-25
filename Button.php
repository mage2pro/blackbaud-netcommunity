<?php
namespace Dfe\BlackbaudNetCommunity;
// 2016-11-20
/** @final Unable to use the PHP «final» keyword here because of the M2 code generation. */
class Button extends \Df\Sso\Button {
	/**
	 * 2016-11-27
	 * @override
	 * @see \Df\Sso\Button::lHref()
	 * @used-by \Df\Sso\Button::htmlL()
	 * @return string
	 */
	final protected function lHref() {return Url::get();}
}