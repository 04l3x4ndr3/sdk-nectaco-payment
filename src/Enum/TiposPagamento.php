<?php

namespace O4l3x4ndr3\SdkNectaco\Enum;

/**
 * Enum TiposPagamento
 *
 * Define os tipos de pagamento disponíveis:
 * - BOLETO: Representa o pagamento via boleto bancário.
 * - CARTAO_DEBITO: Representa o pagamento via cartão de débito.
 * - CARTAO_CREDITO: Representa o pagamento via cartão de crédito.
 *
 * @package O4l3x4ndr3\SdkConexa\Enum
 */
enum TiposPagamento: int
{
    case BOLETO = 1;
    case CARTAO_DEBITO = 2;
    case CARTAO_CREDITO = 3;
}