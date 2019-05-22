<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Managermeal\Meal\Model\ResourceModel\Meal;

 

class Collection  extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'entity_id';
	protected $_eventPrefix = 'bb_meal_entity_collection';
	protected $_eventObject = 'meal_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Managermeal\Meal\Model\Meal', 'Managermeal\Meal\Model\ResourceModel\Meal');
	}

        protected function filterOrder($payment_method)
        {
             
            $this->sales_order_table = "main_table";
            $this->sales_order_payment_table = $this->getTable("sales_order_payment");
            $this->getSelect()
                ->join(array('payment' =>$this->sales_order_payment_table), $this->sales_order_table . '.entity_id= payment.parent_id',
                array('payment_method' => 'payment.method',
                    'order_id' => $this->sales_order_table.'.entity_id'
                )
            );
            $this->getSelect()->where("payment_method=".$payment_method);
        }
}
 
