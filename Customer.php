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
	function id() {return $this->p('userid');}

	/**
	 * 2016-12-02
	 * @override
	 * @see \Df\Sso\Customer::validate()
	 * @used-by \Df\Sso\CustomerReturn::c()
	 * @throws \Exception
	 */
	function validate() {df_assert_eq($this->p('sig'), strtolower(md5(implode([
		$this->id(), $this->p('ts'), S::s()->privateKey()
	]))));}

	/**
	 * 2016-12-02
	 * Blackbaud NetCommunity returns 3 parameters:
	 *	{
	 *		"userid": "45",
	 *		"ts": "2016-12-01T03:34:05.8004519+11:00",
	 *		"sig": "6d910d4e7580cc56af3ec2c7e87412eb"
	 *	}
	 * «Blackbaud NetCommunity 7.1 Single Sign-on Overview Guide» (2017-01-24) https://mage2.pro/t/3696
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
			. df_json_encode($a)
		);
	}
}