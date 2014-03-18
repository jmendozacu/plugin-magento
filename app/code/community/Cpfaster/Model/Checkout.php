<?php
 
 /** * * NOTICE OF LICENSE * * This source file is subject to the Open Software License (OSL). 
 *  It is also available through the world-wide-web at this URL: *
 *  http://opensource.org/licenses/osl-3.0.php * 
 *  @category    Payment Gateway * @package    	ComproPago
 *  @author      André Fuhrman (andrefuhrman@gmail.com) | Edited: Gabriel Matsuoka (gabriel.matsuoka@gmail.com)
 *  @copyright  Copyright (c) ComproPago [http://www.compropago.com]
 *  @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0) 
 */
 
 require_once(Mage::getBaseDir('lib') . '/compropago/compropago.php');
 
 class Cpfaster_Model_Checkout extends Cpfaster_Model_Mp {
  
  // do the client authentication
  public function __construct(){
   $standard = Mage::getModel('cpfaster/Faster');
   $this->client_id = $standard->getConfigData('client_id');
   $this->client_secret = $standard->getConfigData('client_secret');
   $this->mp = new CP($this->client_id, $this->client_secret);
   $this->mp->sandbox_mode($standard->getConfigData('sandbox_checkout') == 1? true : false);
  }
  
  
  // Generate the botton
  public function GetCheckout($preference, $sandbox){

    $customer_name = $preference['payer']['name'];
    $customer_lastname  = $preference['payer']['surname'];
    $customer_email  = $preference['payer']['email'];
    $product_id = $preference['items'][0]['id'];

    if(!Mage::getSingleton('customer/session')->isLoggedIn()) {
      $order = Mage::getModel('sales/order')->loadByIncrementId($preference['items'][0]['id']);
      //If they have no customer id, they're a guest.
      if($order->getCustomerId() === NULL){
        //echo $order->getBillingAddress()->getLastname();
        //echo $order->getCustomerFirstname();
        //echo $order->getCustomerLastname();
        //echo $order->getCustomerEmail();
        $customer_name = $order->getCustomerFirstname();
        $customer_lastname  = $order->getCustomerLastname();
        $customer_email  = $order->getCustomerEmail();
        //$product_id = $preference['items'][0]['id'];
      }
    }

    $string_without_key="&customer_name=".$customer_name." ".$customer_lastname."&customer_email=".$customer_email."&product_price=".$preference['items'][0]['unit_price']."&product_id=".$product_id."&product_name=".urlencode($preference['items'][0]['title']).'&success_url='.urlencode($preference['back_urls']['success']);

   if($this->mp->sandbox_mode()):
    return $preferenceResult["response"]["sandbox_init_point"];
   else:
    $server_result="https://www.compropago.com"; 
    return $server_result."/comprobante/?public_key=".$this->client_id."&customer_data_blocked=true&app_client_name=magento&app_client_version=1.8".$string_without_key;
   endif;


   
  }
  
  public function GetStatusCP($id){
   $paymentInfo = $this->mp->get_payment_info_cp ($id);
   return $paymentInfo['response'];
  
  }

  public function GetStatus($id){// deprecated CP

   $paymentInfo = $this->mp->get_payment_info ($id);
   return $paymentInfo['response'];
  
  }
 }  
?>