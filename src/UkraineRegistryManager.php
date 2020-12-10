<?php

namespace Transloyd\Services\UkraineRegistry;

class UkraineRegistryManager
{
    /**
     * @var UkraineRegistry
     */
    protected UkraineRegistry $ukraineRegistry;

    /**
     * UkraineRegistryManager constructor.
     * @param UkraineRegistry $ukraineRegistry
     */
    public function __construct(UkraineRegistry $ukraineRegistry)
    {
        $this->ukraineRegistry = $ukraineRegistry;
    }

    /**
     * @param string $code
     * @return string|null
     */
    public function getCode(string $code): ?string
    {
        $data = $this->$this->ukraineRegistry->getCode($code);

        return $data->getResponse() ?? null;
    }

    /**
     * @param string|null $birth
     * @param string|null $name
     * @param int|null $limit
     * @return string|null
     */
    public function getName(?string $birth = null, ?string $name = null, ?int $limit = null): ?string
    {
        $data = $this->$this->ukraineRegistry->getName($birth, $name, $limit);

        return $data->getResponse() ?? null;
    }
}