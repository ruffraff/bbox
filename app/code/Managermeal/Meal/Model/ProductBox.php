<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Managermeal\Meal\Model;

 

class ProductBox  extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'catalog_product_box';

	protected $_cacheTag = 'catalog_product_box';

	protected $_eventPrefix = 'catalog_product_box';

	protected function _construct()
	{
		$this->_init('Managermeal\Meal\Model\ResourceModel\ProductBox');
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
 
