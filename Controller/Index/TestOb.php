<?php

namespace Duud\HelloWorld\Controller\Index;

class TestOb extends \Magento\Framework\App\Action\Action
{

	public function execute()
	{
		$textDisplay = new \Magento\Framework\DataObject(array('text' => 'Open Techiz'));
		$this->_eventManager->dispatch('duud_display_text', ['dd_text' => $textDisplay]);
		echo $textDisplay->getText();
		exit;
	}
}
