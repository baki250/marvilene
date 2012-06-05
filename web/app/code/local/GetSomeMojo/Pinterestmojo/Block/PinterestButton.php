<?php
/**
 * Mojo Crative & Technical Solutions
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * @category   GetSomeMojo
 * @package    GetSomeMojo_Pinterestmojo
 * @copyright  Copyright (c) 2012 Mitch Robles, Jr. (http://www.GetSomeMojo.net)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author     Mitch Robles, Jr. <info@GetSomeMojo.net>
 */
  
class GetSomeMojo_Pinterestmojo_Block_PinterestButton extends Mage_Core_Block_Template
{
    
	protected $yeaH4yeaH;
	protected $pinCount;
	protected $pinAlign;
	protected $pinStyle;
	protected $pinWidth;
	protected $pinPrice;
	protected $pinFinalPrice;
	protected $currentImage;
	protected $currentUrl;
	protected $currentDesc;
	protected $oldUrl;
	protected $newUrl;
	
	/**
     * Constructor. Set template.
     */
    protected function _construct()
    {
        parent::_construct();
		
		$_product = Mage::registry('current_product');
    	$_helper = Mage::helper('catalog/output');
		$this->yeaH4yeaH = Mage::getStoreConfig('pinterestmojosection/pinterestmojosettings/activate',Mage::app()->getStore());
		$this->pinCount = Mage::getStoreConfig('pinterestmojosection/pinterestmojosettings/pincount',Mage::app()->getStore());
		$this->pinAlign = (Mage::getStoreConfig('pinterestmojosection/pinterestmojosettings/pinalign',Mage::app()->getStore()) ? 'right' : 'left');
		$this->pinStyle = Mage::getStoreConfig('pinterestmojosection/pinterestmojosettings/pinstyle',Mage::app()->getStore());
		$this->pinWidth = Mage::getStoreConfig('pinterestmojosection/pinterestmojosettings/pinwidth',Mage::app()->getStore());
		$this->pinPrice = Mage::getStoreConfig('pinterestmojosection/pinterestmojosettings/pinprice',Mage::app()->getStore());
		
		if ($_product) :    

			$this->currentImage = urlencode( $this->helper('catalog/image')->init($_product, 'image')->resize($this->pinWidth,null)->constrainOnly(TRUE)->keepAspectRatio(TRUE)->keepFrame(FALSE) );
			$this->currentUrl = Mage::helper('core/url')->getCurrentUrl();
			$this->currentDesc = $_helper->productAttribute($_product, nl2br($_product->getShortDescription()), 'short_description');
			// Add product price to description
			if($this->pinPrice==1):
				$this->pinFinalPrice = Mage::helper('core')->currency($_product->getPrice(),true,false);
				$this->currentDesc .= " [" . $this->pinFinalPrice . "]";
			endif;
			// Addresses & Fixes certain web server settings for URL rewrites
			$this->oldUrl = "http://pinterest.com/pin/create/button/?url=".$this->currentUrl."&media=".$this->currentImage."&description=".$this->currentDesc;
			$this->newUrl = str_replace('.html?','.html&',$this->oldUrl);
			// Set Template
			$this->setTemplate('getsomemojo/pinterestmojo/pinterest_button.phtml');
			
		endif;
	
    }	
	
}

?>