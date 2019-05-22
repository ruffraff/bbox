<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Managermeal\Meal\Model;

 

class Box  extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'bb_box_entity';

	protected $_cacheTag = 'bb_box_entity';

	protected $_eventPrefix = 'bb_box_entity';

	protected function _construct()
	{
		$this->_init('Managermeal\Meal\Model\ResourceModel\Box');
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
 
