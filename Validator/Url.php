<?php
// 2016-11-20
namespace Dfe\BlackbaudNetCommunity\Validator;
use Magento\Framework\Data\Form\Element\AbstractElement as AE;
use Magento\Framework\Phrase;
class Url implements \Df\Framework\IValidator {
	/**
	 * 2016-11-20
	 * @override
	 * @see \Df\Framework\IValidator::check()
	 * @used-by \Df\Framework\Plugin\Data\Form\Element\AbstractElement::afterGetComment()
	 * @used-by \Df\Framework\Validator\Composite::check()
	 * @param AE $e
	 * @return true|Phrase|Phrase[]
	 */
	public function check(AE $e) {
		/** @var true|Phrase|Phrase[] $result */
		$result = true;
		/** @var string|null $root */
		$root = df_trim_ds_right($e['value']);
		if ($root) {
			/** @var string $location */
			$location = 'https://mage2.pro';
			/** @var string $uri */
			$uri = "{$root}/components/GetUserID.ashx?redirect={$location}";
			/** @var \Zend_Http_Client $c */
			$c = new \Zend_Http_Client($uri, ['maxredirects' => 0]);
			try {
				/** @var \Zend_Http_Response $r */
				$r = $c->request();
				// 2016-11-20
				// Blackbaud NetCommunity при перенаправлении добавляет в конце «/».
				if (!$r->isRedirect() || $location !== df_trim_ds_right($r->getHeader('Location'))) {
					$result = __(
						"The verification is failed. The Blackbaud NetCommunity webserver should redirect"
						." the «%1» request to «%2», but it does not.", $uri, $location
					);
				}
			}
			catch (\Zend_Http_Exception $ex) {
				$result = __("Verification failed. Internal message: «%1».", $ex->getMessage());
			}
		}
		return $result;
	}
}