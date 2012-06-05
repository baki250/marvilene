<?php
/**
 * @version   ${project.version} ${build_date}
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - ${copyright_year} RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

class Rockettheme_HomepageTabs_Model_Homepagedefaultlayout
{

    public function toOptionArray()
    {
        return array(
			array('value'=>'grid', 'label'=>Mage::helper('adminhtml')->__('Grid')),
            array('value'=>'list', 'label'=>Mage::helper('adminhtml')->__('List')),
        );
    }

}
