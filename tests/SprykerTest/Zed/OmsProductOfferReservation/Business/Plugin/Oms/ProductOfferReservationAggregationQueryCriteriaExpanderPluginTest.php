<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerTest\Zed\OmsProductOfferReservation\Business\Plugin\Oms;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\QueryCriteriaTransfer;
use Generated\Shared\Transfer\QueryJoinTransfer;
use Generated\Shared\Transfer\ReservationRequestTransfer;
use Generated\Shared\Transfer\WhereClauseTransfer;
use Orm\Zed\Sales\Persistence\Map\SpySalesOrderItemTableMap;
use Spryker\Zed\OmsProductOfferReservation\Communication\Plugin\Oms\ProductOfferReservationAggregationQueryCriteriaExpanderPlugin;

/**
 * Auto-generated group annotations
 *
 * @group SprykerTest
 * @group Zed
 * @group OmsProductOfferReservation
 * @group Business
 * @group Plugin
 * @group Oms
 * @group ProductOfferReservationAggregationQueryCriteriaExpanderPluginTest
 *
 * Add your own group annotations below this line
 */
class ProductOfferReservationAggregationQueryCriteriaExpanderPluginTest extends Unit
{
    /**
     * @var string
     */
    protected const PRODUCT_OFFER_REFERENCE = 'offer-123';

    /**
     * @var \SprykerTest\Zed\OmsProductOfferReservation\OmsProductOfferReservationBusinessTester
     */
    protected $tester;

    public function testExpandReturnsCriteriaUnchangedWhenProductOfferReferenceIsNull(): void
    {
        // Arrange
        $queryCriteriaTransfer = new QueryCriteriaTransfer();
        $reservationRequestTransfer = new ReservationRequestTransfer();

        // Act
        $resultQueryCriteriaTransfer = $this->createPlugin()->expand($queryCriteriaTransfer, $reservationRequestTransfer);

        // Assert
        $this->assertCount(0, $resultQueryCriteriaTransfer->getWhereClauses());
        $this->assertSame([], $resultQueryCriteriaTransfer->getGroupByColumns());
    }

    public function testExpandReturnsCriteriaUnchangedWhenProductOfferReferenceIsEmptyString(): void
    {
        // Arrange
        $queryCriteriaTransfer = new QueryCriteriaTransfer();
        $reservationRequestTransfer = (new ReservationRequestTransfer())
            ->setProductOfferReference('');

        // Act
        $resultQueryCriteriaTransfer = $this->createPlugin()->expand($queryCriteriaTransfer, $reservationRequestTransfer);

        // Assert
        $this->assertCount(0, $resultQueryCriteriaTransfer->getWhereClauses());
        $this->assertSame([], $resultQueryCriteriaTransfer->getGroupByColumns());
    }

    public function testExpandAddsWhereClauseAndGroupByWhenProductOfferReferenceIsSet(): void
    {
        // Arrange
        $queryCriteriaTransfer = new QueryCriteriaTransfer();
        $reservationRequestTransfer = (new ReservationRequestTransfer())
            ->setProductOfferReference(static::PRODUCT_OFFER_REFERENCE);

        // Act
        $resultQueryCriteriaTransfer = $this->createPlugin()->expand($queryCriteriaTransfer, $reservationRequestTransfer);

        // Assert
        $whereClauseTransfers = $resultQueryCriteriaTransfer->getWhereClauses()->getArrayCopy();
        $this->assertCount(1, $whereClauseTransfers);

        $whereClauseTransfer = $whereClauseTransfers[0];
        $this->assertInstanceOf(WhereClauseTransfer::class, $whereClauseTransfer);
        $this->assertSame(
            sprintf('%s = ?', SpySalesOrderItemTableMap::COL_PRODUCT_OFFER_REFERENCE),
            $whereClauseTransfer->getClause(),
        );
        $this->assertSame([static::PRODUCT_OFFER_REFERENCE], $whereClauseTransfer->getParameters());

        // Assert
        $this->assertSame(
            [SpySalesOrderItemTableMap::COL_PRODUCT_OFFER_REFERENCE],
            $resultQueryCriteriaTransfer->getGroupByColumns(),
        );
    }

    public function testExpandPreservesPreExistingCriteriaContributions(): void
    {
        // Arrange
        $preExistingWhereClauseTransfer = (new WhereClauseTransfer())
            ->setClause('spy_sales_order_item.sku = ?')
            ->setParameters(['SKU-1']);

        $queryCriteriaTransfer = (new QueryCriteriaTransfer())
            ->addWhereClause($preExistingWhereClauseTransfer)
            ->addGroupByColumn(SpySalesOrderItemTableMap::COL_SKU)
            ->addJoin(new QueryJoinTransfer());

        $reservationRequestTransfer = (new ReservationRequestTransfer())
            ->setProductOfferReference(static::PRODUCT_OFFER_REFERENCE);

        // Act
        $resultQueryCriteriaTransfer = $this->createPlugin()->expand($queryCriteriaTransfer, $reservationRequestTransfer);

        // Assert
        $this->assertCount(2, $resultQueryCriteriaTransfer->getWhereClauses());
        $this->assertSame(
            [SpySalesOrderItemTableMap::COL_SKU, SpySalesOrderItemTableMap::COL_PRODUCT_OFFER_REFERENCE],
            $resultQueryCriteriaTransfer->getGroupByColumns(),
        );
        $this->assertCount(1, $resultQueryCriteriaTransfer->getJoins());
    }

    public function testExpandReturnsTheSameQueryCriteriaTransferInstance(): void
    {
        // Arrange
        $queryCriteriaTransfer = new QueryCriteriaTransfer();
        $reservationRequestTransfer = (new ReservationRequestTransfer())
            ->setProductOfferReference(static::PRODUCT_OFFER_REFERENCE);

        // Act
        $resultQueryCriteriaTransfer = $this->createPlugin()->expand($queryCriteriaTransfer, $reservationRequestTransfer);

        // Assert
        $this->assertSame($queryCriteriaTransfer, $resultQueryCriteriaTransfer);
    }

    protected function createPlugin(): ProductOfferReservationAggregationQueryCriteriaExpanderPlugin
    {
        return new ProductOfferReservationAggregationQueryCriteriaExpanderPlugin();
    }
}
