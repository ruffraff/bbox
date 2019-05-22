<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Managermeal\Meal\Model;

 

class IngredientMeal  extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'bb_ingredient_meal';

	protected $_cacheTag = 'bb_ingredient_meal';

	protected $_eventPrefix = 'bb_ingredient_meal';

	protected function _construct()
	{
		$this->_init('Managermeal\Meal\Model\ResourceModel\IngredientMeal');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getEntityId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}
 
