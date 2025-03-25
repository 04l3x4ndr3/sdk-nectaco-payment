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
    private ?string $apiToken;

    /**
     * @param Configuration|null $config
     */
    public function __construct(?Configuration $config = null)
    {
        $this->http_errors = true;
        $this->config = $config ?? new Configuration();
        $this->header = array_merge([
            "User-Agent" => "SdkNectaco/1.0",
            "Accept" => "Application/json",
        ], $this->config->getHttpHeader());
        $this->apiToken = null;
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

        if (!empty($this->apiToken)) {
            $this->header['Authorization'] = "Bearer {$this->apiToken}";
        }

        $options = array_filter([
            'headers' => $this->header,
            'json' => $data,
        ]);

        $options['http_errors'] = $this->http_errors;

        $this->requestBody = json_encode($data);

        $res = $client->request($method, $url, $options);

        return json_decode($res->getBody()->getContents());
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
     * @return string|null
     */
    public function getApiToken(): ?string
    {
        return $this->apiToken;
    }

    /**
     * @param string|null $email
     * @param string|null $password
     * @return object
     * @throws GuzzleException
     */
    public function createToken(?string $email = null, ?string $password = null): HTTPClient
    {
        $data = array_filter([
            "email" => $email ?? $this->config->getEmail(),
            "password" => $password ?? $this->config->getPassword(),
        ]);
        $req = $this->call('POST', '/createToken', $data);

        if (isset($req->error)) {
            var_dump($req);
            exit();
            //throw new \Exception($req->error, 401);
        }

        $this->apiToken = $req->token;

        return $this;
    }
}
