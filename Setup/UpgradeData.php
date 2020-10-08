<?php
 
namespace Duud\HelloWorld\Setup;
 
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
 
class UpgradeData implements \Magento\Framework\Setup\UpgradeDataInterface
{
    const YOUR_STORE_ID = 1;
 
    /**
     * @var \Magento\Cms\Model\BlockFactory
     */
    private $_blockFactory;
 
    /**
     * UpgradeData constructor
     * 
     * @param \Magento\Cms\Model\BlockFactory $blockFactory
     */
    public function __construct(
        \Magento\Cms\Model\BlockFactory $blockFactory
    )
    {
        $this->_blockFactory = $blockFactory;
    }
 
    /**
     * Upgrade data for the module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     * @throws \Exception
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
 
        // run the code while upgrading module to version 0.1.1 
        if (version_compare($context->getVersion(), '0.0.4') < 0) {
            $cmsBlock = $this->_blockFactory->create()->setStoreId(self::YOUR_STORE_ID)->load('test-block-3', 'identifier');
            
            if (!$cmsBlock->getId()) {

                $blocks = array([
                    'title' => 'Test Block 3',
                    'identifier' => 'test-block-3',
                    'content' => "<div class='myclass_3'>
                                    <ul>
                                        <li>Item 3</li>
                                        <li>Item 266</li>
                                        <li>Item 3666</li>
                                    </ul>
                                </div>",
                    'is_active' => 1,
                    'stores' => [0]
                ],
                [
                    'title' => 'Test Block 4',
                    'identifier' => 'test-block-4',
                    'content' => "<div class='myclass'>
                                    <ul>
                                        <li>Item 1</li>
                                        <li>Item 2</li>
                                        <li>Item 3</li>
                                    </ul>
                                </div>",
                    'is_active' => 1,
                    'stores' => [0]
                ]
            );
                foreach($blocks as $block) {
                    $this->_blockFactory->create()->setData($block)->save();
                }
                
            }
        }
 
        $setup->endSetup(); 
    }
}