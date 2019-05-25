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
namespace Managermeal\Meal\Block\Box;

/**
 * @api
 * @since 100.0.2
 */

 

class Box extends \Magento\Framework\View\Element\Template
{
    protected $_registry;
    protected $_mealFactory;
    protected $_productBoxFactory;
    protected $_ingredientFactory;
    protected $_ingredientMealFactory;
    protected $_hourMealBoxFactory;
    protected $_resource;
    protected $_object;  
    
    protected $logger;
 
	public function __construct(\Magento\Framework\View\Element\Template\Context $context,
                \Magento\Framework\Registry $registry,
                \Managermeal\Meal\Model\MealFactory $mealFactor,
                \Managermeal\Meal\Model\ProductBoxFactory $productBoxFactor,
                \Managermeal\Meal\Model\HourMealBoxFactory $hourMealBoxFactor,
                \Managermeal\Meal\Model\IngredientFactory $ngredientFactory,
                \Managermeal\Meal\Model\IngredientMealFactory $ngredientMealFactory,
                \Psr\Log\LoggerInterface $logger,
                \Magento\Framework\App\ResourceConnection $Resource,\Magento\Framework\ObjectManagerInterface $objectManager)
	{
            $this->logger = $logger;
            $this->_resource = $Resource;
            $this->_registry = $registry;
            ini_set('display_errors', 1);
            $this->_productBoxFactory = $productBoxFactor;
            $this->_ingredientFactory = $ngredientFactory;
            $this->_hourMealBoxFactory = $hourMealBoxFactor;
            
            $this->_ingredientMealFactory = $ngredientMealFactory;
            $this->_mealFactory = $mealFactor;
            $this->_object = $objectManager;
		parent::__construct($context);
	}

	public function sayHello()
	{    
            //kjkjkj mmm bbbbbb sss
		return __('Hello World1');
	}
        
        public function getTypeMealCollection(){
            //trovare associazione tra box_id e product_id uno a uno
            $currentProduct = $this->getCurrentProduct();
            $idbox=$currentProduct->getId(); 
             
            $collProdBox = $this->_productBoxFactory->create();
            $collectionpro = $collProdBox->getCollection();
            $productbox = $collectionpro->addFieldToFilter('main_table.product_id', $idbox);
            $newid = $productbox->getFirstItem()->getData('box_id');
            
            $collection = $this->_hourMealBoxFactory->create()->getCollection();
            $collection->addFieldToFilter('main_table.box_id', $newid);
            return $collection;
            
        }
        
        public function getMealCollection(){
            
            $currentProduct = $this->getCurrentProduct();
            $idbox=$currentProduct->getId(); 
            
            $collProdBox = $this->_productBoxFactory->create();
            $collectionpro = $collProdBox->getCollection();
            $productbox = $collectionpro->addFieldToFilter('main_table.product_id', $idbox);
            $newid = $productbox->getFirstItem()->getData('box_id');
            
            // $this->logger->info(" dfdfdsfds");   
            $collection = $this->_mealFactory->create()->getCollection();
            
            $second_table_name = $this->_resource->getTableName("bb_meal_box");
            $third_table_name = $this->_resource->getTableName("bb_hour_meal");

            $collection->getSelect()->join(array("bb_meal_box" => $second_table_name), "main_table.entity_id = bb_meal_box.meal_id");
            $collection->addFieldToFilter('bb_meal_box.box_id', $newid);
            return $collection;
	}
        
         public function getMealBoxCollection($newid,$idtypemeal){
            
             
            
            // $this->logger->info(" dfdfdsfds");   
            $collection = $this->_mealFactory->create()->getCollection();
            
            $second_table_name = $this->_resource->getTableName("bb_meal_box");
            

            $collection->getSelect()->join(array("bb_meal_box" => $second_table_name), "main_table.entity_id = bb_meal_box.meal_id");
            $collection->addFieldToFilter('bb_meal_box.box_id', $newid);
            $collection->addFieldToFilter('main_table.type_hour_id', $idtypemeal);
            return $collection;
	}
        
         public function getIngredientCollection($idMeal){
            $collIngrMeal = $this->_ingredientMealFactory->create()->getCollection();
            
            $collingremeal = $collIngrMeal->addFieldToFilter('main_table.meal_id', $idMeal);
            $a = array();
            foreach($collingremeal as $item){
                array_push($a,$item->getData('ingredient_id'));   
            }
            $collection = $this->_ingredientFactory->create()->getCollection();
            $collection->getSelect()->where('main_table.entity_id IN (?)', $a);
             
            return $collection;
	}
        
        
        public function getCurrentCategory()
        {       
            return $this->_registry->registry('current_category');
        }

        public function getCurrentProduct()
        {       
            return $this->_registry->registry('current_product');
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
 
