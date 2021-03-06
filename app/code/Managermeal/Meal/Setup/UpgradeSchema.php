<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Managermeal\Meal\Setup;


use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
/**
 * Description of UpgradeSchema
 *
 * @author raffruff
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
	public function upgrade( SchemaSetupInterface $setup, ModuleContextInterface $context ) {
		$installer = $setup;

		$installer->startSetup();

		if(version_compare($context->getVersion(), '1.1.0', '<')) {
			if (!$installer->tableExists('bb_meals')) {
			$table = $installer->getConnection()->newTable(
				$installer->getTable('bb_meals')
			)
				->addColumn(
					'id',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					null,
					[
						'identity' => true,
						'nullable' => false,
						'primary'  => true,
						'unsigned' => true,
					],
					'Meal ID'
				)
				->addColumn(
					'name',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					['nullable => false'],
					'Meal Name'
				)
				->addColumn(
					'meal_cal_min',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					11,
					[],
					'Meal Meal Cal min'
				)
                                ->addColumn(
					'meal_cal_max',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					11,
					[],
					'Meal Meal Cal max'
				)
				->addColumn(
					'reference_id',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					11,
					[],
					'Meal Reference id'
				)
				->addColumn(
						'created_at',
						\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
						null,
						['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
						'Created At'
				)->addColumn(
					'updated_at',
					\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
					null,
					['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
					'Updated At')
				->setComment('Meal Table');
			$installer->getConnection()->createTable($table);

			$installer->getConnection()->addIndex(
				$installer->getTable('bb_meals'),
				$setup->getIdxName(
					$installer->getTable('bb_meals'),
					['name','meal_cal_min','meal_cal_max','reference_id'],
					\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
				),
				['name','meal_cal_min','meal_cal_max','reference_id'],
				\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
			);	
			}
		}

		$installer->endSetup();
	}
}
