<?php
// 2016-11-20
namespace Dfe\BlackbaudNetCommunity\Controller\Index;
use Df\Framework\Controller\Result\Json;
use Dfe\BlackbaudNetCommunity\Settings as S;
/**
 * 2016-11-30
 * Blackbaud NetCommunity returns 3 parameters:
	{
		"userid": "45",
		"ts": "2016-12-01T03:34:05.8004519+11:00",
		"sig": "6d910d4e7580cc56af3ec2c7e87412eb"
	}
 * https://www.blackbaud.com/files/support/guides/bbnc/ssore.pdf
 */
class Index extends \Magento\Framework\App\Action\Action {
	/**
	 * 2016-11-20
	 * @override
	 * @see \Magento\Framework\App\Action\Action::execute()
	 * @return Json
	 */
	public function execute() {
		try {
			/**
			 * 2016-11-30
			 * «The BBIS user ID of the current logged in user.»
			 * @var int $userid
			 */
			$userid = intval($this->req('userid'));
			/**
			 * 2016-11-30
			 * «This is a signature to verify the authenticity of the user id.
			 * It is created by taking an MD5 hash of the userId, time stamp, and private key
			 * appended together in that order.»
			 * @var string $sig
			 */
			$sig = $this->req('sig');
			/**
			 * 2016-11-30
			 * «Time stamp of when the redirect was created.
			 * This is created using this string format:
			 * http://msdn.microsoft.com/en-us/library/az4se3k1.aspx#Roundtrip»
			 * @var string $ts
			 */
			$ts = $this->req('ts');
			/** @var string $url */
			$url = base64_decode(df_request('url'));
			return Json::i([$userid, $sig, $ts, $url]);
		}
		catch (\Exception $e) {
			xdebug_break();
			return null;
		}
	}

	/**
	 * 2016-11-30
	 * @param string $p [optional]
	 * @return string
	 */
	function req($p) {
		/** @var array(string => string|int) $a */
		$a = dfc($this, function() {return
			df_request() ?: (!df_my_local() ? [] : df_test_file_lj($this, 'empty'))
		;});
		return isset($a[$p]) ? $a[$p] : df_error(
			'The response from the Blackbaud NetCommunity server is invalid,'
			." because the «{$p}» parameter is absent in it."
			."\nThe full response is:\n"
			. df_json_encode_pretty($a)
		);
	}
}