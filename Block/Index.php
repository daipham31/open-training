<?php
namespace Duud\HelloWorld\Block;

class Index extends \Magento\Framework\View\Element\Template
{
    public function getHelloWorldTxt()
    {
        return 'Hello world!';
    }
}