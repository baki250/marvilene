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

class GetSomeMojo_Pinterestmojo_Model_Config_PinCount extends Mage_Core_Model_Config_Data
{
    
    const XML_PATH_PINTERESTMOJO_GROUP1_VALUES = 'pinterestmojosection/pinterestmojosettings/pincount';
    
    const OPTION1_VALUE = 'none';
    const OPTION2_VALUE = 'vertical';
	const OPTION3_VALUE = 'horizontal';
	
    public function getSomeValueFromSystemConfigFile()
    {
        return Mage::getStoreConfig(self::XML_PATH_PINTERESTMOJO_GROUP1_VALUES);
    }

    /**
     * Fills the select field with values
     * 
     * @return array
     */
    public function toOptionArray()
    {
    	    	
        return array(            
            self::OPTION1_VALUE => Mage::helper('pinterestmojo')->__('No Count'),
            self::OPTION2_VALUE => Mage::helper('pinterestmojo')->__('Vertical'),
			self::OPTION3_VALUE => Mage::helper('pinterestmojo')->__('Horizontal'),
        );
    }
}
