<?php

    namespace Duud\HelloWorld\Observer;

    use Magento\Framework\Event\ObserverInterface;
    
    class MyOb implements ObserverInterface
    {
      public function __construct()
      {
        // Observer initialization code...
        // You can use dependency injection to get any class this observer may need.
      }
    
      public function execute(\Magento\Framework\Event\Observer $observer)
      {
        $displayText = $observer->getData('dd_text');
        echo $displayText->getText() . " - Event </br>";
        $displayText->setText('Execute event successfully.');
    
        return $this;
      }
    }
    
?>