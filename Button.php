<?php
// 2016-11-20
namespace Dfe\BlackbaudNetCommunity;
use Dfe\BlackbaudNetCommunity\Settings\Button as SB;
class Button extends \Magento\Framework\View\Element\AbstractBlock {
	/**
	 * 2016-11-20
	 * @override
	 * @see \Magento\Framework\View\Element\AbstractBlock::toHtml()
	 * @return string
	 */
	public function toHtml() {return df_customer_logged_in() ? '' :
		df_tag_a(SB::s()->label(), Url::get())
	;}
}