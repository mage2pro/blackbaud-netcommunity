<?php
// 2016-11-20
namespace Dfe\BlackbaudNetCommunity;
use Dfe\BlackbaudNetCommunity\Settings as S;
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
			/** @var string $redirect */
			$redirect = 'https://mage2.pro';
			/** @var string $url */
			$url = self::build($root, $redirect, false);
			/** @var \Zend_Http_Client $c */
			$c = new \Zend_Http_Client($url, ['maxredirects' => 0]);
			try {
				/** @var \Zend_Http_Response $r */
				$r = $c->request();
				// 2016-11-20
				// Blackbaud NetCommunity при перенаправлении добавляет в конце «/».
				if (!$r->isRedirect() || $redirect !== df_trim_ds_right($r->getHeader('Location'))) {
					$result = __(
						"The verification is failed. The Blackbaud NetCommunity webserver should redirect"
						." the «%1» request to «%2», but it does not.", $url, $redirect
					);
				}
			}
			catch (\Zend_Http_Exception $ex) {
				$result = __("Verification failed. Internal message: «%1».", $ex->getMessage());
			}
		}
		return $result;
	}

	/**
	 * 2016-11-20
	 * @used-by check()
	 * @return string
	 */
	public static function get() {return self::build(S::s()->url(), df_url_frontend(df_route(__CLASS__)));}

	/**
	 * 2016-11-20
	 * @used-by check()
	 * @used-by get()
	 * @param string $root
	 * @param string $redirect
	 * @param bool $requireLogin [optional]
	 * @return string
	 */
	private static function build($root, $redirect, $requireLogin = true) {return
		df_trim_ds_right($root)
		. "/components/GetUserID.ashx?redirect={$redirect}"
		. (!$requireLogin ? '' : '&requireLogin=1')
	;}
}