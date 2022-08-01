<?php

declare(strict_types=1);

namespace App\Services\Swapi;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class SwapiClient extends Client
{
    public function get($uri, array $options = []): ResponseInterface
    {
        $options = array_merge($options, [
            'base_uri' => config('swapi.api_url')
        ]);

        return parent::get($uri, $options);
    }
}
