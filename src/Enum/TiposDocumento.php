<?php

namespace O4l3x4ndr3\SdkConexa\Enum;

/**
 * Enum TiposDocumento
 *
 * Esta enumeração define os diferentes tipos de documentos utilizados no sistema.
 *
 * Valores:
 * - RG (1): Registro Geral.
 * - CPF (2): Cadastro de Pessoa Física.
 * - CNPJ (3): Cadastro Nacional de Pessoa Jurídica.
 * - OUTROS (4): Documentos diversos que não se enquadram nas categorias principais.
 * - IDENTIFICACAO (5): Documento de identificação.
 * - COMPROVANTE_DE_ATIVIDADE (6): Documento que comprova atividade profissional.
 * - COMPROVANTE_DE_RESIDENCIA (7): Documento que comprova residência.
 * - IDENTIFICACAO_DE_PROPRIETARIO (8): Documento de identificação do proprietário.
 */
enum TiposDocumento: int
{
    case RG = 1;
    case CPF = 2;
    case CNPJ = 3;
    case OUTROS = 4;
    case IDENTIFICACAO = 5;
    case COMPROVANTE_DE_ATIVIDADE = 6;
    case COMPROVANTE_DE_RESIDENCIA = 7;
    case IDENTIFICACAO_DE_PROPRIETARIO = 8;
}