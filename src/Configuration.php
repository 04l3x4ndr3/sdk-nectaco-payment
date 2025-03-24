<?php
/**
 * Copyright (c) 2025.
 * @authorAlexandre G R Alves
 * Author GitHub: https://github.com/04l3x4ndr3
 * Project GitHub:  https://github.com/04l3x4ndr3/sdk-nectaco-payment
 */

namespace O4l3x4ndr3\SdkNectaco;

class Configuration
{

    const ENV_DEVELOPMENT = "development";
    const ENV_PRODUCTION = "production";

    private array $URL_PRODUCTION = [
        "default" => 'https://api.zsystems.com.br',
    ];

    private array $URL_DEVELOPMENT = [
        "default" => 'https://api.zsystems.com.br',
    ];

    private ?string $environment;
    private ?string $email;
    private ?string $password;
    private ?string $token;
    private ?array $httpHeader;

    public function __construct(?string $email = null, ?string $password = null, ?string $environment = null)
    {
        $this->environment = $environment ?? $_SERVER['NECTACO_ENVIRONMENT'] ?? self::ENV_DEVELOPMENT;
        $this->email = $_SERVER['NECTACO_EMAIL'] ?? $email;
        $this->password = $_SERVER['NECTACO_PASSWORD'] ?? $password;
        $this->httpHeader = [];
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): Configuration
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): Configuration
    {
        $this->password = $password;
        return $this;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(?string $token): Configuration
    {
        $this->token = $token;
        return $this;
    }

    /**
     * @return string
     */
    public function getEnvironment(): string
    {
        return $this->environment;
    }

    /**
     * @param string $environment
     *
     * @return void
     */
    public function setEnvironment(string $environment): Configuration
    {
        $this->environment = $environment;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getHttpHeader(): ?array
    {
        return $this->httpHeader;
    }

    /**
     * @param array $httpHeader
     */
    public function setHttpHeader(array $httpHeader): Configuration
    {
        $this->httpHeader = $httpHeader;
        return $this;
    }

    /**
     * @param string $context
     *
     * @return string
     */
    public function getUrl(?string $context = 'default'): string
    {
        if ($this->getEnvironment() === self::ENV_PRODUCTION) {
            return $this->URL_PRODUCTION[$context ?? 'default'];
        }

        return $this->URL_DEVELOPMENT[$context ?? 'default'];
    }
}
