<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\OmsProductOfferReservation\Business;

use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use Spryker\Zed\OmsProductOfferReservation\Business\Mapper\OmsProductOfferReservationMapper;
use Spryker\Zed\OmsProductOfferReservation\Business\OmsProductOfferReservation\OmsProductOfferReservationReader;
use Spryker\Zed\OmsProductOfferReservation\Business\OmsProductOfferReservation\OmsProductOfferReservationReaderInterface;
use Spryker\Zed\OmsProductOfferReservation\Business\OmsProductOfferReservation\OmsProductOfferReservationWriter;
use Spryker\Zed\OmsProductOfferReservation\Business\OmsProductOfferReservation\OmsProductOfferReservationWriterInterface;

/**
 * @method \Spryker\Zed\OmsProductOfferReservation\OmsProductOfferReservationConfig getConfig()
 * @method \Spryker\Zed\OmsProductOfferReservation\Persistence\OmsProductOfferReservationRepositoryInterface getRepository()
 * @method \Spryker\Zed\OmsProductOfferReservation\Persistence\OmsProductOfferReservationEntityManagerInterface getEntityManager()
 */
class OmsProductOfferReservationBusinessFactory extends AbstractBusinessFactory
{
    public function createOmsProductOfferReservationReader(): OmsProductOfferReservationReaderInterface
    {
        return new OmsProductOfferReservationReader($this->getRepository());
    }

    public function createOmsProductOfferReservationWriter(): OmsProductOfferReservationWriterInterface
    {
        return new OmsProductOfferReservationWriter(
            $this->getEntityManager(),
            $this->getRepository(),
            $this->createOmsProductOfferReservationMapper(),
        );
    }

    public function createOmsProductOfferReservationMapper(): OmsProductOfferReservationMapper
    {
        return new OmsProductOfferReservationMapper();
    }
}
