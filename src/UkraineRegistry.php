<?php

declare(strict_types=1);

namespace Transloyd\Services\UkraineRegistry;

use Transloyd\Services\Traits\DotEnvTrait;
use Transloyd\Services\UkraineRegistry\Exception\{InvalidResponse, InvalidResponseException, NameException};

class UkraineRegistry extends Facade
{
    use DotEnvTrait;

    public function __construct(Provider $provider)
    {
        parent::__construct($provider);

        $this->initDotEnv();
    }

    public function getCode(string $code): self
    {
        try {
            $this->response = $this->getResponseBody(
                $this->provider->createRequest(Provider::GET_METHOD, $this->rootUrl . "/code/$code")
            );
        } catch (InvalidResponse $exception) {
            throw new InvalidResponseException($exception->getMessage(), 503, $exception);
        }

        return $this;
    }

    public function getName(?string $birth = null, ?string $name = null, ?int $limit = null): self
    {
        if (empty($birth) && empty($name)) {
            throw new NameException('The name and/or birth parameter is missing', 503);
        }

        try {
            $params = array_filter(
                [
                    'birth' => $birth,
                    'name' => $name,
                    'limit' => $limit,
                ]
            );

            $this->response = $this->getResponseBody(
                $this->provider->createRequest(
                    Provider::GET_METHOD,
                    $this->rootUrl . "/name?" . http_build_query($params)
                )
            );
        } catch (InvalidResponse $exception) {
            throw new InvalidResponseException($exception->getMessage(), 503, $exception);
        }

        return $this;
    }
}
