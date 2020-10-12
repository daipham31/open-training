<?php
namespace Duud\HelloWorld\Plugin;

class ProductName
{
    public function afterGetName(\Magento\Catalog\Model\Product $subject, $result)
    {
        $title = "Test";
        return $result . $title;
    }


    public function afterGetPrice(\Magento\Catalog\Model\Product $subject, $result)
    {
        return $result + 100;
    }

}