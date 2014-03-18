<?php

/** * * NOTICE OF LICENSE * * This source file is subject to the Open Software License (OSL). 
 *  It is also available through the world-wide-web at this URL: *
 *  http://opensource.org/licenses/osl-3.0.php * 
 *  @category    Payment Gateway * @package    	ComproPago
 *  @author      André Fuhrman (andrefuhrman@gmail.com) 
 *  @copyright   Copyright (c) ComproPago [http://www.compropago.com]
 *  @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0) 
 */



// class CPfaster_Block_Template_Bt extends Mage_Core_Block_Template

class CPfaster_Block_General_Body extends Mage_Core_Block_Template
{
    
    protected $_checkoutpage = 'cpfaster/checkout/zipcode';
    protected $_checkoutpageprod = 'cpfaster/checkout/addcart';
 
    protected function _beforeToHtml()
    {  
        
     $checkouta = Mage::getModel('cpfaster/faster')->getConfigData('faster_button_checkout');
     $checkoutp = Mage::getModel('cpfaster/faster')->getConfigData('faster_button_product');
     $checkouts = Mage::getModel('cpfaster/faster')->getConfigData('faster_button_checkout_sidebar');
     
     if ($checkouta == 1 || $checkoutp == 1 ||$checkouts == 1){
         $this->setFaster(true);
     } else {
         $this->setFaster(false);
     }
        
     $this->setcheckoutfaster($this->getUrl($this->_checkoutpage))->setcheckoutfasterproduct($this->getUrl($this->_checkoutpageprod));
    }
    protected function _toHtml()
    {
         return parent::_toHtml();
    }
    
   

}

?>