<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Managermeal\Meal\Model\ResourceModel\Meal;

 

class Collection  extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'entity_id';
	protected $_eventPrefix = 'bb_ingredient_entity_collection';
	protected $_eventObject = 'ingredient_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Managermeal\Meal\Model\Ingredient', 'Managermeal\Meal\Model\ResourceModel\Ingredient');
	}

}
 
