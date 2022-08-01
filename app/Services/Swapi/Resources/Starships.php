<?php

declare(strict_types=1);

namespace App\Services\Swapi\Resources;

use App\Exceptions\Http\ClientException;
use App\Exceptions\Http\UnableToConnectException;
use App\Services\Swapi\SwapiClient;
use App\Transformers\Swapi\StarshipsTransformer;
use GuzzleHttp\Exception\ClientException as GuzzleClientException;
use GuzzleHttp\Exception\ConnectException;

class Starships
{
    private $client;

    private const LIST = 'starships';

    public function __construct(SwapiClient $client)
    {
        $this->client = $client;
    }

    public function list(string $distanceToTravel, string $query = ''): array
    {
        try {
            $response = $this->client->get(self::LIST . '?' . $query);

            $parsedResponse = json_decode($response->getBody()->getContents(), true);

            return StarshipsTransformer::fromApiList($parsedResponse['results'], $distanceToTravel);
        } catch (GuzzleClientException $exception) {
            throw new ClientException($exception);
        } catch (ConnectException $exception) {
            throw new UnableToConnectException($exception);
        }
    }
}
