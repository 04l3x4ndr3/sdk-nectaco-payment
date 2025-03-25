<?php

namespace O4l3x4ndr3\SdkNectaco\Enum;

/**
 * Enum StatusPagamento
 *
 * Representa os possíveis status de pagamento em um sistema.
 *
 * Os valores possíveis são:
 * - PENDENTE (1): Pagamento está pendente de processar.
 * - APROVADO (2): Pagamento foi aprovado com sucesso.
 * - FALHADO (3): Tentativa de pagamento falhou.
 * - CANCELADO (4): Pagamento foi cancelado.
 * - PARCIALMENTE_PAGO (5): Pagamento foi realizado parcialmente.
 * - ESTORNADO (6): Pagamento foi estornado.
 * - EM_PROCESSAMENTO (7): Pagamento está em processamento.
 * - PRE_AUTORIZADO (8): Pagamento foi pré-autorizado.
 *
 * @package O4l3x4ndr3\SdkConexa\Enum
 */
enum StatusPedido: int
{
    case PENDENTE = 1;
    case APROVADO = 2;
    case FALHADO = 3;
    case CANCELADO = 4;
    case PARCIALMENTE_PAGO = 5;
    case ESTORNADO = 6;
    case EM_PROCESSAMENTO = 7;
    case PRE_AUTORIZADO = 8;
}