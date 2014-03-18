<?php
/**
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL).
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
*
* @category   	Payment Gateway
* @package    	ComproPago
* @author      	Gabriel Matsuoka (gabriel.matsuoka@gmail.com)
* @copyright  	Copyright (c) ComproPago [http://www.compropago.com]
* @license    	http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*/

require_once(Mage::getBaseDir('lib') . '/compropago/compropago.php');
 
class Cpfaster_Model_Source_CategoryId extends Mage_Payment_Model_Method_Abstract{
	
	public function toOptionArray (){
		/*
		$response = CPRestClient::get("/item_categories");
		$response = $response['response'];
		
		$cat = array();
		$count = 0;
		foreach($response as $v):
			//force category others first
			if($v['id'] == "others"):
				$cat[0] = array('value' => $v['id'], 'label'=>Mage::helper('adminhtml')->__($v['description']));
			else:
				$count++;
				$cat[$count] = array('value' => $v['id'], 'label'=>Mage::helper('adminhtml')->__($v['description']));
			endif;
		
		endforeach;
		*/
		$cat[] = array('value' => "N/A", 'label'=>Mage::helper('adminhtml')->__("N/A"));

		//force order by key
		ksort($cat);
		return $cat;
	
	}
}
###