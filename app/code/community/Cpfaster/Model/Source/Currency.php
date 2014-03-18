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

class Cpfaster_Model_Source_Currency{
 public function toOptionArray (){
 
  $standard = Mage::getModel('cpfaster/Faster');
  $site = $standard->getConfigData('acc_origin');
  
  /*$mp = Mage::getModel('cpfaster/Mp');
  
  if ( $site != "" ) {
   
   $response = CPRestClient::get("/sites/$site");
   $response = $response['response'];
      
   foreach($response['currencies'] as $v){
    $cur[] = array('value' => $v['id'], 'label'=>Mage::helper('adminhtml')->__($v['id']));
   }
  } else {
   $cur[] = array('value' => "", 'label'=>Mage::helper('adminhtml')->__("Please Reload Page"));
  }
  */

  $cur[] = array('value' => "MXN", 'label'=>Mage::helper('adminhtml')->__("MXN"));

  return $cur;
 
 }
}