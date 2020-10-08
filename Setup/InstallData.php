<?php
 
namespace Duud\HelloWorld\Setup;
 
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
 
class InstallData implements \Magento\Framework\Setup\InstallDataInterface
{
    /**
     * @var \Magento\Cms\Model\BlockFactory
     */
    private $_blockFactory;
 
    /**
     * InstallData constructor
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
     * Installs data for a module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     * @throws \Exception
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        // Load cms block by identifier
        $cmsBlock = $this->_blockFactory->create()->load('test-block', 'identifier');
 
        // Create CMS Block
        if (!$cmsBlock->getId()) {
            $cmsBlockData = [
                'title' => 'Test Block',
                'identifier' => 'test-block',
                'content' => "<div class='myclass'>
                                <ul>
                                    <li>Item 1</li>
                                    <li>Item 2</li>
                                    <li>Item 3</li>
                                </ul>
                            </div>",
                'is_active' => 1,
                'stores' => [0]
            ];
 
            $this->_blockFactory->create()->setData($cmsBlockData)->save();
        }
    }
}