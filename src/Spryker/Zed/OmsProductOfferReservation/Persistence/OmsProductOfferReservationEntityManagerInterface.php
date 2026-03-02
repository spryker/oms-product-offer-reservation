<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\OmsProductOfferReservation\Persistence;

use Generated\Shared\Transfer\OmsProductOfferReservationTransfer;

interface OmsProductOfferReservationEntityManagerInterface
{
    public function create(OmsProductOfferReservationTransfer $omsProductOfferReservationTransfer): void;

    public function update(OmsProductOfferReservationTransfer $omsProductOfferReservationTransfer): void;
}
