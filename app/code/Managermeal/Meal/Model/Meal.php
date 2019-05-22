<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Managermeal\Meal\Model;

 

class Meal  extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'bb_meal_entity';

	protected $_cacheTag = 'bb_meal_entity';

	protected $_eventPrefix = 'bb_meal_entity';

	protected function _construct()
	{
		$this->_init('Managermeal\Meal\Model\ResourceModel\Meal');
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
 
