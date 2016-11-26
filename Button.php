<?php
// 2016-11-20
namespace Dfe\BlackbaudNetCommunity;
class Button extends \Df\Sso\Button {
	/**
	 * 2016-11-26
	 * @override
	 * @see \Df\Sso\Button::htmlL()
	 * @used-by \Df\Sso\Button::html()
	 * @return string
	 */
	protected function htmlL() {return df_tag_a($this->s()->label(), Url::get());}

	/**
	 * 2016-11-26
	 * @override
	 * @see \Df\Sso\Button::htmlU()
	 * @used-by \Df\Sso\Button::html()
	 * @return string
	 */
	protected function htmlU() {return '';}
}