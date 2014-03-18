<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */



// class CPfaster_Block_Template_Bt extends Mage_Core_Block_Template

class Cpfaster_Block_Pagar_Product extends Mage_Core_Block_Template
{
    protected $_shouldRender = true;
    protected $_checkoutpage = 'cpfaster/checkout';

     
    public function _construct()
    {
        Mage::log('CPfaster_Block_Botao_Product');
       
    }
    protected function _beforeToHtml()
    {
  //     $this->setcheckoutfaster($this->getUrl($this->_checkoutpage))
    //    ->setimgcheckout($this->getSkinUrl('images/compropago/pagar.jpg'));
       $this->addtocart();

    }
  
    protected function _toHtml()
    {
         return parent::_toHtml();
    }
    
    
    private function addtocart(){
        
        
        $currentproduct = Mage::registry('current_product');
      
     
        
// ubiquitous product data
     
        
        $cart = Mage::getModel("checkout/cart");
   //     $cart->addProduct($entityId, $qty);                                
   //     $cart->save();
        
    }
    
   

}

?>