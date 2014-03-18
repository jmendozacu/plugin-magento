<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */



// class CPfaster_Block_Template_Bt extends Mage_Core_Block_Template

class CPfaster_Block_Botao extends Mage_Core_Block_Template{
    protected $_shouldRender = true;
    protected $_checkoutpage = 'cpfaster/checkout';
    protected $_addcart = 'cpfaster/checkout/addcart';

     
    public function _construct(){
        Mage::log('CPfaster_Block_Botao');
       
    }
    protected function _beforeToHtml(){ 
       $this->setcheckoutfaster($this->getUrl($this->_checkoutpage))->setMpAddCart('cpfaster/checkout/addcart')
        ->setimgcheckout($this->getSkinUrl('images/compropago/pagar.jpg'));
    }
  
    protected function _toHtml(){
         return parent::_toHtml();
    }
    
   

}

?>