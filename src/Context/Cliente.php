<?php

use GuzzleHttp\Exception\GuzzleException;
use O4l3x4ndr3\SdkNectaco\Configuration;
use O4l3x4ndr3\SdkNectaco\Helpers\HTTPClient;

/**
 * Classe Cliente.
 *
 * Esta classe representa a interação com o endpoint de clientes na API.
 * Extende a classe HTTPClient responsável por realizar as requisições HTTP.
 *
 * @package O4l3x4ndr3\SdkNectaco\Context
 * @url https://payment-doc.nectaco.com.br/dashboard.php#client
 */
class Cliente extends HTTPClient
{
    /**
     * @var Cliente $cliente Instância do cliente.
     */
    private Cliente $cliente;

    /**
     * Construtor da classe Cliente.
     *
     * @param Configuration|null $configuration Configuração da API. Opcional.
     * @throws GuzzleException
     */
    public function __construct(?Configuration $configuration = null)
    {
        parent::__construct($configuration);

        if (empty($this->config->getToken())) {
            $this->createToken();
        }
    }

    /**
     * Cria um novo cliente na API.
     *
     * @param \O4l3x4ndr3\SdkNectaco\Types\Cliente $cliente Objeto do tipo Cliente contendo os dados necessários.
     * @return object Objeto de resposta da API.
     * @throws GuzzleException Exceção lançada caso ocorra um erro na requisição HTTP.
     */
    public function create(\O4l3x4ndr3\SdkNectaco\Types\Cliente $cliente): object
    {
        $endpoint = "/clientes";
        $data = $cliente->toArray();
        return $this->call('POST', $endpoint, array_filter($data));
    }

    /**
     * Exclui um cliente existente na API.
     *
     * @param int $clienteId ID do cliente que será excluído.
     * @return object Objeto de resposta da API.
     * @throws GuzzleException Exceção lançada caso ocorra um erro na requisição HTTP.
     */
    public function delete(int $clienteId): object
    {
        $endpoint = "/clientes/$clienteId/excluir";
        return $this->call('DELETE', $endpoint);
    }
}