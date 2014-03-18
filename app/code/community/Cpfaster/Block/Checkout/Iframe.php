<?php
 
/** * * NOTICE OF LICENSE * * This source file is subject to the Open Software License (OSL). 
 *  It is also available through the world-wide-web at this URL: *
 *  http://opensource.org/licenses/osl-3.0.php * 
 *  @category    Payment Gateway * @package    	ComproPago
 *  @author      André Fuhrman (andrefuhrman@gmail.com) / Edited: Gabriel Matsuoka (gabriel.matsuoka@gmail.com)
 *  @copyright  Copyright (c) ComproPago [http://www.compropago.com]
 *  @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0) 
 */

class Cpfaster_Block_Checkout_Iframe extends Mage_Core_Block_Abstract
{   
    
    protected function _toHtml(){
    
        $faster = Mage::getModel('cpfaster/faster');
       
        $preference = $faster->getInitPoint();
	
        if (isset($preference)):
	    
	    $html = '<center><iframe onreturn="checkoutReturn" id="CP-Checkout-IFrame" src="' . $preference . '" name="CP-Checkout" width="740" height="600" frameborder="0"></iframe></center>
    
	    <script type="text/javascript">
	    (function(){function $CPBR_load(){window.$CPBR_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;
	    s.src = ("https:"==document.location.protocol?"https://www.compropago.com/org-img/jsapi/mptools/buttons/":"http://mp-tools.mlstatic.com/buttons/")+"render.js";
	    var x = document.getElementsByTagName("script")[0];x.parentNode.insertBefore(s, x);window.$CPBR_loaded = true;})();}
	    window.$CPBR_loaded !== true ? (window.attachEvent ? window.attachEvent("onload", $CPBR_load) : window.addEventListener("load", $CPBR_load, false)) : null;})();
	    </script>';
	    
	else:
	
	    $html = "An error occurred.";
        endif;
        
	return utf8_decode($html);
    }
}