<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Managermeal\Meal\Model\ResourceModel\MealBox;

 

class Collection  extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'entity_id';
	protected $_eventPrefix = 'bb_meal_box_collection';
	protected $_eventObject = 'mealbox_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Managermeal\Meal\Model\MealBox', 'Managermeal\Meal\Model\ResourceModel\MealBox');
	}

}
 
