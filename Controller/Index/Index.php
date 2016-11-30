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
			/** @var int $userid */
			$userid = intval($this->req('userid'));
			/** @var string $sig */
			$sig = $this->req('sig');
			/** @var string $ts */
			$ts = $this->req('ts');
			return Json::i([$userid, $sig, $ts]);
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