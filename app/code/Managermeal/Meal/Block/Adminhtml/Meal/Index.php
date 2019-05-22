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
namespace Managermeal\Meal\Block\Adminhtml\Meal;

/**
 * @api
 * @since 100.0.2
 */
use Magento\Framework\App\Bootstrap;
 

class Index extends \Magento\Framework\View\Element\Template
{
    
    protected $_mealFactory;
    protected $_resource;
    protected $_object;
	public function __construct(\Magento\Framework\View\Element\Template\Context $context,
                \Managermeal\Meal\Model\MealFactory $mealFactor,
                \Magento\Framework\App\ResourceConnection $Resource,\Magento\Framework\ObjectManagerInterface $objectManager)
	{
            $this->_resource = $Resource;
            ini_set('display_errors', 1);
            $this->_mealFactory = $mealFactor;
            $this->_object = $objectManager;
		parent::__construct($context);
	}

	public function sayHello()
	{
		return __('Hello World');
	}
        
        public function getMealCollection($idbox){
             
            $collection = $this->_mealFactory->create()->getCollection();
             $second_table_name = $this->_resource->getTableName("bb_meal_box");
//        $third_table_name = $this->_resource->getTableName("bb_meal_entity");

        $collection->getSelect()->join(array("bb_meal_box" => $second_table_name), "main_table.entity_id = bb_meal_box.meal_id");
//                join(array("bb_meal_entity" => $third_table_name), "bb_meal_box.meal_id = bb_meal_entity.entity_id");
        $collection->addFieldToFilter('bb_meal_box.box_id', $idbox);
            return $collection;
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
 
