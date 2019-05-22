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
namespace Managermeal\Meal\Block\Adminhtml\Ingredient;

/**
 * @api
 * @since 100.0.2
 */
class Index extends \Magento\Framework\View\Element\Template
{
    protected $_ingredientFactory;
	public function __construct(\Magento\Framework\View\Element\Template\Context $context,\Managermeal\Meal\Model\IngredientFactory $ingredientFactor)
	{
            ini_set('display_errors', 1);
            $this->_ingredientFactory = $ingredientFactor;
		parent::__construct($context);
	}

	public function sayHello()
	{
		return __('Hello World');
	}
        
        public function getIngredientCollection(){
		$ingredient = $this->_ingredientFactory->create();
		return $ingredient->getCollection();
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
 
