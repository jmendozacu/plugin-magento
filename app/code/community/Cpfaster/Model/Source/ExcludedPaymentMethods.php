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
 * @author      Giovanni Hernandez
 * @copyright  	Copyright (c) ComproPago [http://www.compropago.com]
 * @license    	http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

require_once(Mage::getBaseDir('lib') . '/compropago/compropago.php');

class Cpfaster_Model_Source_ExcludedPaymentMethods extends Mage_Payment_Model_Method_Abstract{
	
	public function toOptionArray (){
		/*
		$standard = Mage::getModel('cpfaster/Faster');
		//$standard = new Cpfaster_Model_Faster();
		
		$site = $standard->getConfigData('acc_origin');
		$mp = Mage::getModel('cpfaster/Mp');
		if ( $site != "" ) {
		
			$url = "https://api.compropago.com/sites/$site/payment_methods";
			
			$response = CPRestClient::get("/sites/$site/payment_methods");
			$response = $response['response'];
			
			foreach($response as $v){
				if ( $v['id'] != 'account_money' ) {
					$methods[] = array('value' => $v['id'], 'label'=>Mage::helper('adminhtml')->__($v['name']));
				}
			}
		
		} else {
			$methods[] = array('value' => "", 'label'=>Mage::helper('adminhtml')->__("Please Reload Page"));
		}*/
		$methods[] = array('value' => "EFECTIVO", 'label'=>Mage::helper('adminhtml')->__("Efectivo"));
		return $methods;
	}
}
