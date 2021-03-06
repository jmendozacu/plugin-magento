 <?php
/** * * NOTICE OF LICENSE * * This source file is subject to the Open Software License (OSL). 
 *  It is also available through the world-wide-web at this URL: *
 *  http://opensource.org/licenses/osl-3.0.php * 
 *  @category    Payment Gateway * @package    	ComproPago
 *  @author      André Fuhrman (andrefuhrman@gmail.com) 
 *  @copyright  Copyright (c) ComproPago [http://www.compropago.com]
 *  @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0) 
 */

class Cpfaster_Block_Checkout_Redirect extends Mage_Core_Block_Abstract
{   
    
   
    
    protected function _toHtml(){
        
        $faster = Mage::getModel('cpfaster/faster');
        $preference = $faster->getInitPoint();

        $html = '<meta http-equiv="REFRESH" content="0;url='. $preference .'">';
        return utf8_decode($html);
  
    }
 }