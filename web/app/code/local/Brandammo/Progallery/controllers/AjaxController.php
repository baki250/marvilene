<?php
class Brandammo_Progallery_AjaxController extends Mage_Core_Controller_Front_Action
{
    public function get_product_viewAction()
    {
      $_product = Mage::getModel('catalog/product')->load($_POST['pid']); 
      $galleryImages = $_product->getMediaGalleryImages();
      $viewImageUri = null;
      foreach ($galleryImages as $k => $img)
      {
         if ($k == $_POST['clicked_thumb_index'])
         {
            $viewImageUri = Mage::helper('catalog/image')->init($_product, 'image', $img->getFile());
            break;
         }
      }
      echo json_encode(array('uri' => $viewImageUri->__toString()));
    }
}