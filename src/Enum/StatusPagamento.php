<?php

namespace O4l3x4ndr3\SdkNectaco\Enum;

/**
 * Enum StatusPagamento
 *
 * Representa os diferentes estados de pagamento no sistema.
 * Define os tipos de pagamento disponíveis:
 * - PENDENTE (1): Pagamento pendente de processamento.
 * - PAGO (2): Pagamento concluído com sucesso.
 * - CANCELADO (3): Pagamento foi cancelado.
 * - ESTORNADO (4): Pamento foi estornado ao cliente.
 * - PRE_AUTORIZADO (5): Pagamento pré-autorizado, mas ainda não capturado.
 * @package O4l3x4ndr3\SdkConexa\Enum
 */
enum StatusPagamento: int
{
    case PENDENTE = 1;
    case PAGO = 2;
    case CANCELADO = 3;
    case ESTORNADO = 4;
    case PRE_AUTORIZADO = 5;
}