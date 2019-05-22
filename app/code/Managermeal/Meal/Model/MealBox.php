<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Managermeal\Meal\Model;

 

class MealBox  extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'bb_meal_box';

	protected $_cacheTag = 'bb_meal_box';

	protected $_eventPrefix = 'bb_meal_box';

	protected function _construct()
	{
		$this->_init('Managermeal\Meal\Model\ResourceModel\MealBox');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}
 
