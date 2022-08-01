<?php

declare(strict_types=1);

namespace App\Http\Controllers\Swapi;

use App\Http\Controllers\Controller;
use App\Services\Swapi\Resources\Starships;
use Illuminate\Http\JsonResponse;

class StarshipsController extends Controller
{
    private $starshipsService;

    public function __construct(Starships $starshipsService)
    {
        $this->starshipsService = $starshipsService;
    }

    public function listStarships(): JsonResponse
    {
        $mglt = request('mglt');

        return response()->json($this->starshipsService->list($mglt, request()->getQueryString()));
    }
}
