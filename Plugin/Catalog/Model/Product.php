<?php
namespace Duud\HelloWorld\Plugin\Catalog\Model;

class Product
{
    public function afterGetName(\Magento\Catalog\Model\Product $subject, $result)
    {
        $title = $subject->getAttributeText('second_name');
        return $title;
    }
}