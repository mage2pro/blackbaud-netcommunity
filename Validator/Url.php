<?php
// 2016-11-20
namespace Dfe\BlackbaudNetCommunity\Validator;
class Url implements \Df\Framework\IValidator {
	/**
	 * 2016-11-20
	 * @override
	 * @see \Df\Framework\IValidator::check()
	 * @used-by \Df\Framework\Plugin\Data\Form\Element\AbstractElement::afterGetComment()
	 * @used-by \Df\Framework\Validator\Composite::check()
	 * @return true|string
	 */
	public function check() {
		return true;
	}
}