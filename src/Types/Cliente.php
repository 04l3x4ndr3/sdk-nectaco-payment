<?php

namespace O4l3x4ndr3\SdkNectaco\Types;

class Cliente
{
    private ?string $nome;
    private ?string $documento;
    private ?string $dataNascimento;
    private ?string $email;
    private ?string $celular;
    private ?string $sexo;
    private ?Endereco $endereco;

    /**
     * @param string|null $nome
     * @param string|null $documento
     * @param string|null $dataNascimento
     * @param string|null $email
     * @param string|null $celular
     * @param string|null $sexo
     * @param Endereco|null $endereco
     */
    public function __construct(?string $nome, ?string $documento, ?string $dataNascimento, ?string $email, ?string $celular, ?string $sexo, ?Endereco $endereco = null)
    {
        $this->nome = $nome;
        $this->documento = $documento;
        $this->dataNascimento = $dataNascimento;
        $this->email = $email;
        $this->celular = $celular;
        $this->sexo = $sexo;
        $this->endereco = $endereco;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(?string $nome): Cliente
    {
        $this->nome = $nome;
        return $this;
    }

    public function getDocumento(): ?string
    {
        return $this->documento;
    }

    public function setDocumento(?string $documento): Cliente
    {
        $this->documento = $documento;
        return $this;
    }

    public function getDataNascimento(): ?string
    {
        return $this->dataNascimento;
    }

    public function setDataNascimento(?string $dataNascimento): Cliente
    {
        $this->dataNascimento = $dataNascimento;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): Cliente
    {
        $this->email = $email;
        return $this;
    }

    public function getCelular(): ?string
    {
        return $this->celular;
    }

    public function setCelular(?string $celular): Cliente
    {
        $this->celular = $celular;
        return $this;
    }

    public function getSexo(): ?string
    {
        return $this->sexo;
    }

    public function setSexo(?string $sexo): Cliente
    {
        $this->sexo = $sexo;
        return $this;
    }

    public function getEndereco(): ?Endereco
    {
        return $this->endereco;
    }

    public function setEndereco(?Endereco $endereco): Cliente
    {
        $this->endereco = $endereco;
        return $this;
    }

    public function toArray(): array
    {
        $vars = get_object_vars($this);
        $vars['endereco'] = !empty($this->endereco) ? $this->endereco->toArray() : null;
        return $vars;
    }
}