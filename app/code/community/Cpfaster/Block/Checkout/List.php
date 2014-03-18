<?php

/** * * NOTICE OF LICENSE * * This source file is subject to the Open Software License (OSL). 
 *  It is also available through the world-wide-web at this URL: *
 *  http://opensource.org/licenses/osl-3.0.php * 
 *  @category    Payment Gateway * @package    	ComproPago
 *  @author      André Fuhrman (andrefuhrman@gmail.com) 
 *  @copyright  Copyright (c) ComproPago [http://www.compropago.com]
 *  @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0) 
 */


class Cpfaster_Block_Checkout_List extends Mage_Payment_Block_Form{
    
    protected function _construct(){

        parent::_construct();
        $this->setTemplate('cpfaster/checkout/list.phtml');
        
    }
}




?>
