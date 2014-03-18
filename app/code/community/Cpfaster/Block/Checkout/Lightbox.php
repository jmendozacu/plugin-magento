<?php
 
 
/** * * NOTICE OF LICENSE * * This source file is subject to the Open Software License (OSL). 
 *  It is also available through the world-wide-web at this URL: *
 *  http://opensource.org/licenses/osl-3.0.php * 
 *  @category    Payment Gateway * @package    	ComproPago
 *  @author      André Fuhrman (andrefuhrman@gmail.com) / Edited: Gabriel Matsuoka (gabriel.matsuoka@gmail.com)
 *  @copyright  Copyright (c) ComproPago [http://www.compropago.com]
 *  @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0) 
 */

class Cpfaster_Block_Checkout_Lightbox extends Mage_Core_Block_Abstract
{   
    
    protected function _toHtml(){
    

        $faster = Mage::getModel('cpfaster/faster');
       
        $preference = $faster->getInitPoint();
        

        if (isset($preference)):
            $html = '<div class="">';
            $html .= '<div class="left"/><h3 style="margin: 10px;">Para completar la compra dar click en:</h3></div>';
            $html .= '  <div class="left"><a id="payment_btn" href="'.$preference.'" class=""><img src="'.$this->getSkinUrl("images/cpfaster/payment-green-btn.png").'" alt="PAGAR"></a></div>';
            $html .= '  <script type="text/javascript">';
            $html .= '      var modal = new Control.Modal($("payment_btn"),{';
            $html .= '          overlayOpacity: 0.75,';
            $html .= '          className: "modal",';
            $html .= '          fade: true,';
            $html .= '           iframe: true,';
            $html .= '           width: 800,';
            $html .= '           height: 800';
            $html .= '          });';
            $html .= '     $("payment_btn").click()';
            $html .= '  </script>';
            $html .= '</div>';
        
        else:
            
            $html = "An error occurred.";
            
        endif;
        
        return utf8_decode($html);
        
    }
}