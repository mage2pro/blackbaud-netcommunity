<?php
// 2016-11-20
namespace Dfe\BlackbaudNetCommunity;
use Df\Sso\CustomerReturn;
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
	function check(AE $e) {
		/** @var true|Phrase|Phrase[] $result */
		$result = true;
		/** @var string|null $root */
		if ($root = df_trim_ds_right($e['value'])) {
			// 2017-04-14
			// Any working website can be used here for the validation.
			try {
				$redirect = 'https://mage2.pro'; /** @var string $redirect */
				$url = self::build($root, $redirect, false); /** @var string $url */
				/** @var \Zend_Http_Response $r */
				$r = df_zf_http($url, ['maxredirects' => 0])->request();
				// 2016-11-20
				// Blackbaud NetCommunity при перенаправлении добавляет в конце «/».
				if (!$r->isRedirect() || $redirect !== df_trim_ds_right($r->getHeader('Location'))) {
					$result = __(
						"The verification is failed."
						." The Blackbaud NetCommunity webserver should redirect"
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
	static function get() {return self::build(S::s()->url(), df_url_frontend(df_route(__CLASS__), [
		/** 2016-12-02 Это значение будет обратно декодировано в методе @see CustomerReturn::execute() */
		CustomerReturn::REDIRECT_URL_KEY => base64_encode(df_current_url())
	]));}

	/**
	 * 2016-11-20
	 * @used-by check()
	 * @used-by get()
	 * @param string $root
	 * @param string $redirect
	 * @param bool $requireLogin [optional]
	 * 2016-11-30
	 * «If the user is not logged in and the optional require login parameter isn’t supplied,
	 * then no query string information will be added to the redirect URL.»
	 * «Blackbaud NetCommunity 7.1 Single Sign-on Overview Guide» (2017-01-24) https://mage2.pro/t/3696
	 * @return string
	 */
	private static function build($root, $redirect, $requireLogin = true) {return
		df_trim_ds_right($root)
		. "/components/GetUserID.ashx?redirect={$redirect}"
		. (!$requireLogin ? '' : '&requireLogin=1')
	;}
}