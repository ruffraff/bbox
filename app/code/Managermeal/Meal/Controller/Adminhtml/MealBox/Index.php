<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Managermeal\Meal\Controller\Adminhtml\MealBox;

/**
 * System Template admin controller
 *
 * @author      Magento Core Team <core@magentocommerce.com>
 */
abstract class Index extends \Magento\Framework\App\Action\Action
{
   
    protected $_mealBoxFactory;
    
    protected $_pageFactory;
	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Managermeal\Meal\Model\MealBoxFactory $mealBoxFactory)
	{
            ini_set('display_errors', 1);
		$this->_pageFactory = $pageFactory;
                $this->_mealBoxFactory = $mealBoxFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
            $meal = $this->_mealBoxFactory->create();
//		$collection = $meal->getCollection();
//		foreach($collection as $item){
//			echo "<pre>";
//			print_r($item->getData());
//			echo "</pre>";
//		}
//		exit();
            $resultPage = $this->_pageFactory->create();
                 //$resultPage->getConfig()->getTitle()->prepend(__('Custom Front View'));
		return $resultPage;
	}
 
}
