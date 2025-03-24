<?php

namespace O4l3x4ndr3\SdkConexa\Enum;


/**
 * Enum StatusAssinatura
 *
 * Representa os diferentes status de uma assinatura dentro do sistema.
 *
 * Opções disponíveis:
 * - AGUARDANDO (1): Status indicando que a assinatura está aguardando confirmação.
 * - CANCELADO (2): Status indicando que a assinatura foi cancelada.
 * - PAGO (3): Status indicando que a assinatura foi paga.
 * - ATRASADO (4): Status indicando que a assinatura está atrasada.
 * - SUSPENSO (5): Status indicando que a assinatura está suspensa.
 */
enum StatusAssinatura: int
{
    case AGUARDANDO = 1;
    case CANCELADO = 2;
    case PAGO = 3;
    case ATRASADO = 4;
    case SUSPENSO = 5;
}