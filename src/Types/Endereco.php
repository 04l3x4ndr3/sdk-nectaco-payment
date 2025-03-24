<?php

namespace O4l3x4ndr3\SdkNectaco\Types;

class Endereco
{
    private ?string $logradouro;
    private ?string $numero;
    private ?string $cep;
    private ?string $cidade;
    private ?string $estado;
    private ?string $complemento;

    /**
     * @param string|null $logradouro
     * @param string|null $numero
     * @param string|null $cep
     * @param string|null $cidade
     * @param string|null $estado
     * @param string|null $complemento
     */
    public function __construct(?string $logradouro, ?string $numero, ?string $cep, ?string $cidade, ?string $estado, ?string $complemento)
    {
        $this->logradouro = $logradouro;
        $this->numero = $numero;
        $this->cep = $cep;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->complemento = $complemento;
    }

    public function getLogradouro(): ?string
    {
        return $this->logradouro;
    }

    public function setLogradouro(?string $logradouro): void
    {
        $this->logradouro = $logradouro;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(?string $numero): void
    {
        $this->numero = $numero;
    }

    public function getCep(): ?string
    {
        return $this->cep;
    }

    public function setCep(?string $cep): void
    {
        $this->cep = $cep;
    }

    public function getCidade(): ?string
    {
        return $this->cidade;
    }

    public function setCidade(?string $cidade): void
    {
        $this->cidade = $cidade;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(?string $estado): void
    {
        $this->estado = $estado;
    }

    public function getComplemento(): ?string
    {
        return $this->complemento;
    }

    public function setComplemento(?string $complemento): void
    {
        $this->complemento = $complemento;
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }


}