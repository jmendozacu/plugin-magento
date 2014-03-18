<?php

/** * * NOTICE OF LICENSE * * This source file is subject to the Open Software License (OSL). 
 *  It is also available through the world-wide-web at this URL: *
 *  http://opensource.org/licenses/osl-3.0.php * 
 *  @category    Payment Gateway * @package    	ComproPago
 *  @author      André Fuhrman (andrefuhrman@gmail.com) 
 *  @copyright  Copyright (c) ComproPago [http://www.compropago.com]
 *  @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0) 
 */


// class CPfaster_Block_Template_Bt extends Mage_Core_Block_Template

class CPfaster_Block_General_Botao extends Mage_Core_Block_Template
{
    protected $_shouldRender = true;
    protected $_checkoutpage = 'cpfaster/checkout/zipcode';
     
 
    protected function _beforeToHtml()
    {  
       $country = Mage::getModel('cpfaster/faster')->getConfigData('acc_origin');
       $cart = Mage::getModel('cpfaster/faster')->getConfigData('faster_button_checkout');
       $side = Mage::getModel('cpfaster/faster')->getConfigData('faster_button_checkout_sidebar');
       $prod = Mage::getModel('cpfaster/faster')->getConfigData('faster_button_product');
       $this->setcheckoutfaster($this->getUrl($this->_checkoutpage))->setCountry($country)
       ->setAllowedProduct($prod)->setAllowedCart($cart)->setAllowedSidebar($side)        
       ->setimgcheckoutBr($this->getSkinUrl('images/cpfaster/pagarbr.jpg'))->setimgcheckoutAr($this->getSkinUrl('images/cpfaster/pagarar.jpg'));
    }
  
    protected function _toHtml()
    {
         return parent::_toHtml();
    }
    
   

}

?>