<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\OmsProductOfferReservation\Communication\Plugin\Oms;

use Generated\Shared\Transfer\QueryCriteriaTransfer;
use Generated\Shared\Transfer\ReservationRequestTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\OmsExtension\Dependency\Plugin\OmsReservationAggregationQueryCriteriaExpanderPluginInterface;

/**
 * @method \Spryker\Zed\OmsProductOfferReservation\Persistence\OmsProductOfferReservationRepositoryInterface getRepository()
 */
class ProductOfferReservationAggregationQueryCriteriaExpanderPlugin extends AbstractPlugin implements OmsReservationAggregationQueryCriteriaExpanderPluginInterface
{
    /**
     * {@inheritDoc}
     * - Scopes the OMS reservation aggregation to the product offer carried by the request,
     *   so running totals reflect only sales items of that offer.
     * - No-op when `productOfferReference` is empty.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\QueryCriteriaTransfer $queryCriteriaTransfer
     * @param \Generated\Shared\Transfer\ReservationRequestTransfer $reservationRequestTransfer
     *
     * @return \Generated\Shared\Transfer\QueryCriteriaTransfer
     */
    public function expand(
        QueryCriteriaTransfer $queryCriteriaTransfer,
        ReservationRequestTransfer $reservationRequestTransfer
    ): QueryCriteriaTransfer {
        return $this->getRepository()->expandOmsReservationAggregationQueryCriteria(
            $queryCriteriaTransfer,
            $reservationRequestTransfer,
        );
    }
}
