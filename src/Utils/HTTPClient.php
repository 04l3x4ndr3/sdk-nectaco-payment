<?php

namespace O4l3x4ndr3\SdkNectaco\Utils;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use O4l3x4ndr3\SdkNectaco\Configuration;

class HTTPClient
{
    protected Configuration $config;
    private ?array $header;
    private string $requestBody = '';
    private string $http_errors;

    /**
     * @param Configuration|null $config
     */
    public function __construct(?Configuration $config = null)
    {
        $this->http_errors = false;

        $this->config = $config ?? new Configuration();
        $this->header = array_merge([
            "User-Agent" => "SdkNectaco/1.0",
            "Accept" => "Application/json",
        ], $this->config->getHttpHeader());
    }

    /**
     * @param string $method
     * @param string $endpoint
     * @param array|null $data
     * @param string|null $context
     * @return object
     * @throws GuzzleException
     */
    public function call(string $method, string $endpoint, ?array $data = null, ?string $context = null): object
    {
        $client = new Client();
        $url = $this->config->getUrl($context) . $endpoint;

        $options = array_filter([
            'headers' => $this->header,
            'json' => $data,
            'token' => $this->config->getToken()
        ]);

        $options['http_errors'] = $this->http_errors;

        $this->requestBody = json_encode($data);

        $res = $client->request($method, $url, $options);

        return json_decode($res->getBody());
    }

    /**
     * @param string $http_errors
     * @return $this
     */
    public function setHttpErrors(string $http_errors): HTTPClient
    {
        $this->http_errors = $http_errors;
        return $this;
    }

    /**
     * @return string
     */
    public function getRequestBody(): string
    {
        return $this->requestBody;
    }

    /**
     * @param string|null $email
     * @param string|null $password
     * @return object
     * @throws GuzzleException
     */
    public function createToken(?string $email = null, ?string $password = null): object
    {
        $req = $this->call('POST', '/createToken', [
            "email" => $email ?? $this->config->getEmail(),
            "password" => $password ?? $this->config->getPassword(),
        ]);

        if (isset($req->error)) {
            throw new \Exception($req->error, 401);
        }

        $this->config->setToken($req->token);

        return $req->token;
    }
}
