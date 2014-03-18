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
 
class Cpfaster_Model_Source_OriginAccount extends Mage_Payment_Model_Method_Abstract{
	public function toOptionArray (){
		
		$sites[] = array('value' => 'MX', 'label'=>Mage::helper('adminhtml')->__('Mexico'));      

		return $sites;
	}
}
###