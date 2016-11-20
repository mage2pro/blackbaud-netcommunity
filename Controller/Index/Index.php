<?php
// 2016-11-20
namespace Dfe\BlackbaudNetCommunity\Controller\Index;
use Df\Framework\Controller\Result\Json;
use Dfe\BlackbaudNetCommunity\Settings as S;
class Index extends \Magento\Framework\App\Action\Action {
	/**
	 * 2016-11-20
	 * @override
	 * @see \Magento\Framework\App\Action\Action::execute()
	 * @return Json
	 */
	public function execute() {return df_leh(function(){return Json::i('OK');});}
}