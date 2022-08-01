<?php

declare(strict_types=1);

namespace App\Exceptions\Http;

use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class ClientException extends HttpException
{
    public function __construct(Throwable $previous)
    {
        parent::__construct($previous->getCode(), $previous->getMessage());
    }
}
