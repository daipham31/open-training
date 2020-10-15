<?php
namespace Duud\HelloWorld\Plugin;

class ProductName
{
    public function afterGetName(\Magento\Catalog\Model\Product $subject, $result)
    {
        $title = "Test teststs";
        return $result . $title;
    }

    public function beforeSetName(\Magento\Catalog\Model\Product $subject, $name) {
        return 'before' . $name;
      }    


    public function afterGetPrice(\Magento\Catalog\Model\Product $subject, $result)
    {
        return $result + 100;
    }

}