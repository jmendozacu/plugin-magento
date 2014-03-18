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

class CPfaster_Block_Checkout_Zipcode extends Mage_Core_Block_Template
{
 
    
    protected $_postpage = 'cpfaster/checkout/shippingPost';
    
    
    protected function _beforeToHtml(){
         $this->setpostpage($this->getUrl($this->_postpage));
    } 

    protected function _toHtml()
    {
         return parent::_toHtml();
    }
    
 
    


}

?>