<?php

use GuzzleHttp\Exception\GuzzleException;
use O4l3x4ndr3\SdkNectaco\Configuration;
use O4l3x4ndr3\SdkNectaco\Helpers\HTTPClient;
use O4l3x4ndr3\SdkNectaco\Types\Cartao;
use O4l3x4ndr3\SdkNectaco\Types\Endereco;

class Assinatura extends HTTPClient
{

    /**
     * @throws GuzzleException
     */
    public function __construct(?Configuration $configuration = null)
    {
        parent::__construct($configuration);

        if (empty($this->config->getToken())) {
            $this->createToken();
        }
    }

    public function criar(?int $planoId, ?string $expiration_date, ?\O4l3x4ndr3\SdkNectaco\Types\Cliente $cliente, ?Endereco $endereco, ?Cartao $cartao): ?object
    {
        $endpoint = "/planos/assinar";
        $data = array_filter([
            "planoId" => $planoId,
            "expiration_date" => $expiration_date,
            "cliente" => $cliente->toArray(),
            "endereco" => $endereco->toArray(),
            "cartao" => $cartao->toArray()
        ]);

        return $this->call('POST', $endpoint, array_filter($data));
    }

    public function atualizar(int $assinaturaId, array $fields): ?object
    {
        $endpoint = "/planos/assinar/$assinaturaId";
        $data = array_filter($fields);
        return $this->call('PUT', $endpoint, array_filter($data));
    }

    public function remover(int $assinaturaId): ?object
    {
        $endpoint = "/planos/assinatura/$assinaturaId";
        return $this->call('DELETE', $endpoint);
    }

    public function detalhar(int $assinaturaId): ?object
    {
        $endpoint = "/planos/assinatura/$assinaturaId";
        return $this->call('GET', $endpoint);
    }

    public function listar(?array $filter = [], ?int $page = null, ?int $limit = null): ?array
    {
        $endpoint = "/planos/assinaturas";
        $filter = array_filter(array_merge($filter, ['page' => $page, 'limit' => $limit]));
        $endpoint .= (!empty($filter) ? '?' . http_build_query($filter) : '');
        return $this->call('GET', $endpoint);
    }

    public function suspender(int $assinaturaId): ?object
    {
        $endpoint = "/planos/assinatura/suspender";
        $data = array_filter([
            'assinatura_id' => $assinaturaId
        ]);
        return $this->call('POST', $endpoint, $data);
    }

    public function reativar(int $assinaturaId): ?object
    {
        $endpoint = "/planos/assinatura/reativar";
        $data = array_filter([
            'assinatura_id' => $assinaturaId
        ]);
        return $this->call('POST', $endpoint, $data);
    }

    public function faturas(int $assinaturaId, ?array $filter = [], ?int $page = null, ?int $limit = null): ?array
    {
        $endpoint = "/planos/assinatura/$assinaturaId/faturas";
        $filter = array_filter(array_merge($filter, ['page' => $page, 'limit' => $limit]));
        $endpoint .= (!empty($filter) ? '?' . http_build_query($filter) : '');
        return $this->call('GET', $endpoint);
    }

    public function estornar(int $faturaId)
    {
        $endpoint = "/planos/assinatura/estornar";
        $data = [
            'id' => $faturaId
        ];
        return $this->call('POST', $endpoint, array_filter($data));
    }
}