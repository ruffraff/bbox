<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * Adminhtml system templates page content block
 *
 * @author      Magento Core Team <core@magentocommerce.com>
 */
namespace Managermeal\Meal\Block\Adminhtml\MealBox;

/**
 * @api
 * @since 100.0.2
 */

 

class Index extends \Magento\Framework\View\Element\Template
{
    protected $_mealBoxFactory;
	public function __construct(\Magento\Framework\View\Element\Template\Context $context,\Managermeal\Meal\Model\MealBoxFactory $mealboxFactor)
	{
            
            ini_set('display_errors', 1);
            $this->_mealBoxFactory = $mealboxFactor;
		parent::__construct($context);
	}

	public function sayHello()
	{
		return __('Hello World');
	}
        
        public function getMealBoxCollection(){
		$mealbox = $this->_mealBoxFactory->create();
		return $mealbox->getCollection();
	}
        
//         public function addRecord($name, $id)
//        {
//            $data=array('name' => $name, 'id' => $id);
//            $this->_mealFactory->create()->setData($data)->save();
//        }
 
        public function getValue()
        {
            $data=$this->_pageFactory->create()->getCollection();
            foreach ($data as $d )
            {
                echo $d->getName().' - ';   //table field "name"
                    //table field "age"
            }
        }
}
 
