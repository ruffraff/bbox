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
namespace Managermeal\Meal\Block\Adminhtml\Box;

 
/**
 * @api
 * @since 100.0.2
 */
class Index extends \Magento\Framework\View\Element\Template
{
    protected $_resource;
    protected $_boxFactory;
    protected $_mealboxFactory;
    
	public function __construct(\Magento\Framework\View\Element\Template\Context $context,
                \Managermeal\Meal\Model\BoxFactory $boxFactor,
                \Managermeal\Meal\Model\MealBoxFactory $mealboxFactor,
                \Magento\Framework\App\ResourceConnection $Resource)
	{
            ini_set('display_errors', 1);
            $this->_resource = $Resource;
            $this->_boxFactory = $boxFactor;
            $this->_mealboxFactory = $mealboxFactor;
		parent::__construct($context);
	}

	public function sayHello()
	{
		return __('Hello World');
	}
        
        public function getBoxCollection(){
		$box = $this->_boxFactory->create();
		return $box->getCollection();
	}
        
        
        public function getJoinData(){
             $collection = $this->_boxFactory->create()->getCollection();
           //  $collection = $this->_mealboxFactory->create()->getCollection();
            // $second_table_name = $this->_resource->getTableName("bb_box_entity");
//            $third_table_name = $this->_resource->getTableName("bb_meal_entity");
//
           //   $collection->getSelect()->joinLeft(array("bb_box_entity" => $second_table_name), "bb_box_entity.entity_id = main_table.box_id");
//                     $collection->getSelect()->join(array("bb_meal_entity" => $third_table_name),
//                                                   "main_table.meal_id = bb_meal_entity.entity_id")->group('main_table.entity_id');
            $second_table_name = $this->_resource->getTableName("bb_meal_box");
//        $third_table_name = $this->_resource->getTableName("bb_meal_entity");

        $collection->getSelect()->join(array("bb_meal_box" => $second_table_name), "main_table.entity_id = bb_meal_box.box_id");
//                join(array("bb_meal_entity" => $third_table_name), "bb_meal_box.meal_id = bb_meal_entity.entity_id");
        

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
                echo $d->getAge().'<br>';    //table field "age"
            }
        }
}
 
