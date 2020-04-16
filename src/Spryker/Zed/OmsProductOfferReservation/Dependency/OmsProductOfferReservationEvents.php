<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Spryker Marketplace License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\OmsProductOfferReservation\Dependency;

interface OmsProductOfferReservationEvents
{
    /**
     * Specification:
     * - Represents spy_oms_product_offer_reservation entity creation.
     *
     * @api
     */
    public const ENTITY_SPY_OMS_PRODUCT_OFFER_RESERVATION_CREATE = 'Entity.spy_oms_product_offer_reservation.create';

    /**
     * Specification:
     * - Represents spy_oms_product_offer_reservation entity deletion.
     *
     * @api
     */
    public const ENTITY_SPY_OMS_PRODUCT_OFFER_RESERVATION_DELETE = 'Entity.spy_oms_product_offer_reservation.delete';

    /**
     * Specification:
     * - Represents spy_oms_product_offer_reservation entity update.
     *
     * @api
     */
    public const ENTITY_SPY_OMS_PRODUCT_OFFER_RESERVATION_UPDATE = 'Entity.spy_oms_product_offer_reservation.update';
}
