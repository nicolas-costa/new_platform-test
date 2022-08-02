<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Controllers\Swapi;

use Tests\TestCase;

class StarshipControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testReturnNotFoundWhenNoShipsAreReturned(): void
    {
        $response = $this->json('get','/api/swapi/starships?mglt=10000&page=100');

        $response->assertNotFound();
    }

    public function testReturnListOfStarshipsWithNumberOfStops(): void
    {
        $response = $this->json('get','api/swapi/starships?mglt=1000000');

        $response->assertOk();
        $response->assertJsonFragment(['name' => 'CR90 corvette']);

        $response->assertJsonFragment([
            'name' => 'Millennium Falcon',
            'number_of_stops' => 9
        ]);

        $response->assertJsonFragment([
            'name' => 'Y-wing',
            'number_of_stops' => 74
        ]);
    }

    public function testReturnsUnprocessableEntityWhenMGLTNotSupplied(): void
    {
        $response = $this->json('get', 'api/swapi/starships');

        $response->assertUnprocessable();
        $response->assertJsonValidationErrorFor('mglt');
    }
}
