<?php

namespace O4l3x4ndr3\SdkNectaco\Types;

class Cartao
{
    private ?string $cartao;
    private ?string $titular;
    private ?string $validade;
    private ?string $numero;
    private ?string $codigoSeguranca;

    /**
     * @param string|null $cartao
     * @param string|null $titular
     * @param string|null $validade
     * @param string|null $numero
     * @param string|null $codigoSeguranca
     */
    public function __construct(?string $cartao, ?string $titular, ?string $validade, ?string $numero, ?string $codigoSeguranca)
    {
        $this->cartao = $cartao;
        $this->titular = $titular;
        $this->validade = $validade;
        $this->numero = $numero;
        $this->codigoSeguranca = $codigoSeguranca;
    }

    public function getCartao(): ?string
    {
        return $this->cartao;
    }

    public function setCartao(?string $cartao): Cartao
    {
        $this->cartao = $cartao;
        return $this;
    }

    public function getTitular(): ?string
    {
        return $this->titular;
    }

    public function setTitular(?string $titular): Cartao
    {
        $this->titular = $titular;
        return $this;
    }

    public function getValidade(): ?string
    {
        return $this->validade;
    }

    public function setValidade(?string $validade): Cartao
    {
        $this->validade = $validade;
        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(?string $numero): Cartao
    {
        $this->numero = $numero;
        return $this;
    }

    public function getCodigoSeguranca(): ?string
    {
        return $this->codigoSeguranca;
    }

    public function setCodigoSeguranca(?string $codigoSeguranca): Cartao
    {
        $this->codigoSeguranca = $codigoSeguranca;
        return $this;
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}