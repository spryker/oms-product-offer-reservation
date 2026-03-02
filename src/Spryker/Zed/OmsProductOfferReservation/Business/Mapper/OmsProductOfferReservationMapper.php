<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\OmsProductOfferReservation\Business\Mapper;

use Generated\Shared\Transfer\OmsProductOfferReservationTransfer;
use Generated\Shared\Transfer\ReservationRequestTransfer;

class OmsProductOfferReservationMapper
{
    public function mapReservationRequestTransferToOmsProductOfferReservationTransfer(
        ReservationRequestTransfer $reservationRequestTransfer,
        OmsProductOfferReservationTransfer $omsProductOfferReservationTransfer
    ): OmsProductOfferReservationTransfer {
        return $omsProductOfferReservationTransfer->setReservationQuantity($reservationRequestTransfer->getReservationQuantity())
            ->setIdStore($reservationRequestTransfer->getStore()->getIdStore())
            ->setProductOfferReference($reservationRequestTransfer->getProductOfferReference());
    }
}
