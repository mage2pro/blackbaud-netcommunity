<?php
// 2016-11-20
namespace Dfe\BlackbaudNetCommunity;
class Button extends \Df\Sso\Button {
	/**
	 * 2016-11-27
	 * @override
	 * @see \Df\Sso\Button::lHref()
	 * @used-by \Df\Sso\Button::htmlL()
	 * @return string
	 */
	protected function lHref() {return Url::get();}
}