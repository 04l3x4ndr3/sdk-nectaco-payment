<?php

namespace O4l3x4ndr3\SdkNectaco\Context;

use GuzzleHttp\Exception\GuzzleException;
use O4l3x4ndr3\SdkNectaco\Configuration;
use O4l3x4ndr3\SdkNectaco\Utils\HTTPClient;

/**
 * Classe responsável por gerenciar operações relacionadas a planos.
 * Extende a funcionalidade do cliente HTTP para realizar chamadas à API de planos.
 */
class Plano extends HTTPClient
{
    /**
     * Construtor da classe Plano.
     *
     * @param Configuration|null $configuration Configuração a ser utilizada para o cliente HTTP.
     *                                          Caso não seja passada, será utilizada a configuração padrão.
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
     * Cria um novo plano.
     *
     * @param \O4l3x4ndr3\SdkNectaco\Types\Plano $plano Objeto do tipo Plano que contém as informações para criação.
     *
     * @return object Retorna o objeto de resposta da chamada HTTP contendo os dados do plano criado.
     *
     * @throws GuzzleException Caso ocorra algum erro durante a requisição HTTP.
     */
    public function criar(\O4l3x4ndr3\SdkNectaco\Types\Plano $plano): object
    {
        $endpoint = "/planos";
        $data = $plano->toArray();
        return $this->call('POST', $endpoint, array_filter($data));
    }

    /**
     * Atualiza as informações de um plano existente.
     *
     * @param string $id ID do plano que será atualizado.
     * @param \O4l3x4ndr3\SdkNectaco\Types\Plano $plano Objeto do tipo Plano que contém os novos dados.
     *
     * @return object Retorna o objeto de resposta da chamada HTTP contendo os dados atualizados do plano.
     *
     * @throws GuzzleException Caso ocorra algum erro durante a requisição HTTP.
     */
    public function atualizar(string $id, \O4l3x4ndr3\SdkNectaco\Types\Plano $plano): object
    {
        $endpoint = "/planos/$id";
        $data = array_filter($plano->toArray());
        return $this->call('PUT', $endpoint, $data);
    }

    /**
     * Exclui um plano existente.
     *
     * @param string $id ID do plano que será excluído.
     *
     * @return object Retorna o objeto de resposta da chamada HTTP informando o resultado da exclusão.
     *
     * @throws GuzzleException Caso ocorra algum erro durante a requisição HTTP.
     */
    public function remover(string $id): object
    {
        $endpoint = "/planos/$id";
        return $this->call('DELETE', $endpoint);
    }

    /**
     * Recupera as informações de um plano específico.
     *
     * @param string $id ID do plano que será consultado.
     *
     * @return object Retorna o objeto de resposta da chamada HTTP contendo os dados do plano.
     *
     * @throws GuzzleException Caso ocorra algum erro durante a requisição HTTP.
     */
    public function detalhar(string $id): object
    {
        $endpoint = "/planos?id=$id";
        $ret = $this->call('GET', $endpoint);

        // adapta a estrutura de retorno para registro único
        if (isset($ret->planos)) {
            $ret->plano = $ret->planos[0];
            unset($ret->planos, $ret->paginas, $ret->quantidade);
        }

        return $ret;
    }

    /**
     * Lista planos cadastrados com base em filtros opcionais.
     *
     * @param array $filter Filtros opcionais para a listagem. (ex.: ['nome' => 'Plano X']).
     * @param int|null $page Página da listagem (paginação).
     * @param int|null $limit Quantidade de resultados por página.
     *
     * @return object Retorna o objeto de resposta da chamada HTTP contendo a lista de planos.
     *
     * @throws GuzzleException Caso ocorra algum erro durante a requisição HTTP.
     */
    public function listar(array $filter = [], int $page = null, int $limit = null): object
    {
        $endpoint = "/planos";
        $filter = array_filter(array_merge($filter, ['page' => $page, 'limit' => $limit]));
        $endpoint .= (!empty($filter) ? '?' . http_build_query($filter) : '');
        return $this->call('GET', $endpoint);
    }
}