<?php
namespace Duud\HelloWorld\Controller\Cookie;
class DeleteCookie extends \Magento\Framework\App\Action\Action
{
/**
* @var \Magento\Framework\Stdlib\CookieManagerInterface
*/
protected $_cookieManager;
/**
* @param \Magento\Framework\App\Action\Context $context
* @param \Magento\Framework\Stdlib\CookieManagerInterface $cookieManager
*/
public function __construct(
     \Magento\Framework\App\Action\Context $context,
     \Magento\Framework\Stdlib\CookieManagerInterface $cookieManager
)
{
     $this->_cookieManager = $cookieManager;
     parent::__construct($context);
}
public function execute()
{
     $this->_cookieManager->deleteCookie(
         \Duud\HelloWorld\Controller\Cookie\Addcookie::COOKIE_NAME
     );
     echo('DELETED');
}
}