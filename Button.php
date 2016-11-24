<?php
// 2016-11-20
namespace Dfe\BlackbaudNetCommunity;
class Button extends \Df\Sso\Button {
	/**
	 * 2016-11-23
	 * @override
	 * @see \Df\Sso\Button::loggedOut()
	 * @used-by \Df\Sso\Button::_toHtml()
	 * @return string
	 */
	protected function loggedOut() {return df_tag_a($this->s()->label(), Url::get());}
}