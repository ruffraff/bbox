<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Managermeal\Meal\Model;

 

class HourMealBox  extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'bb_box_hour_meal';

	protected $_cacheTag = 'bb_box_hour_meal';

	protected $_eventPrefix = 'bb_box_hour_meal';

	protected function _construct()
	{
		$this->_init('Managermeal\Meal\Model\ResourceModel\HourMealBox');
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
 
