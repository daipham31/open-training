<?php

namespace Duud\HelloWorld\Model;

class Product extends \Magento\Catalog\Model\Product

{
    public function getName()
    {
        return $this->_getData(self::NAME). '+changed';
    }

    public function getPrice()
    {
        if ($this->_calculatePrice || !$this->getData(self::PRICE)) {
            return $this->getPriceModel()->getPrice($this) + 0.5;
        } else {
            return $this->getData(self::PRICE);
        }
    }
}
