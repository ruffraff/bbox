<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Managermeal\Meal\Model\ResourceModel\ProductBox;

 

class Collection  extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'entity_id';
	protected $_eventPrefix = 'catalog_product_box_collection';
	protected $_eventObject = 'productbox_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Managermeal\Meal\Model\ProductBox', 'Managermeal\Meal\Model\ResourceModel\ProductBox');
	}

}
 
