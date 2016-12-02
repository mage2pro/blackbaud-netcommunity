<?php
// 2016-12-02
namespace Dfe\BlackbaudNetCommunity;
use Dfe\BlackbaudNetCommunity\Settings as S;
class Customer extends \Df\Sso\Customer {
	/**
	 * 2016-12-02
	 * «The BBIS user ID of the current logged in user.»
	 * @override
	 * @see \Df\Sso\Customer::id()
	 * @used-by \Df\Sso\CustomerReturn::register()
	 * @return int|null
	 */
	public function id() {return $this->p('userid');}

	/**
	 * 2016-12-02
	 * @override
	 * @see \Df\Sso\Customer::validate()
	 * @used-by \Df\Sso\CustomerReturn::c()
	 * @return void
	 * @throws \Exception
	 */
	public function validate() {
		df_assert_eq($this->p('sig'), strtolower(md5(implode([
			$this->id(), $this->p('ts'), S::s()->privateKey()
		]))));
	}

	/**
	 * 2016-12-02
	 * Blackbaud NetCommunity returns 3 parameters:
		{
			"userid": "45",
			"ts": "2016-12-01T03:34:05.8004519+11:00",
			"sig": "6d910d4e7580cc56af3ec2c7e87412eb"
		}
	 * https://www.blackbaud.com/files/support/guides/bbnc/ssore.pdf
	 * @param string $key
	 * @return string
	 */
	private function p($key) {
		/** @var array(string => string|int) $a */
		$a = dfc($this, function() {return
			df_request() ?: (!df_my_local() ? [] : df_test_file_lj($this, 'empty'))
		;});
		return isset($a[$key]) ? $a[$key] : df_error(
			'The response from the Blackbaud NetCommunity server is invalid,'
			." because the «{$key}» parameter is absent in it."
			."\nThe full response is:\n"
			. df_json_encode_pretty($a)
		);
	}
}
