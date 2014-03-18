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

class Cpfaster_Model_Source_CheckoutMode extends Mage_Payment_Model_Method_Abstract{
	
	public function toOptionArray (){
		return array(
		    array('value' => 'lightbox', 'label'=>Mage::helper('adminhtml')->__('LightBox')),
		    //array('value' => 'iframe',   'label'=>Mage::helper('adminhtml')->__('Transparent / Iframe')),
		    //array('value' => 'redirect', 'label'=>Mage::helper('adminhtml')->__('Redirect')),
		    );
	}
}
