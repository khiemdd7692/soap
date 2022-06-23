<?php

namespace KhiemDD\Soap\API\Types;


class Service
{
    /**
     * @var string
     */
    public $result;

    /**
     * Woori constructor.
     *
     * @param string $result
     */
    public function __construct($result)
    {
        $this->result = $result;
    }

}
