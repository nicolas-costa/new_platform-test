<?php

declare(strict_types=1);

namespace App\Exceptions\Http;

use App\Exceptions\ExceptionTokens;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class UnableToConnectException extends HttpException
{
    public function __construct(Throwable $previous)
    {
        parent::__construct($previous->getCode(), ExceptionTokens::UNABLE_TO_CONNECT, $previous);
    }
}
