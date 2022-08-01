<?php

declare(strict_types=1);

namespace App\Transformers\Swapi;

use Carbon\Carbon;

class StarshipsTransformer
{
    public static function fromApiList(array $response, $distanceToTravel): array
    {
        if (!$response) {
            return [];
        }

        $transformed = [];

        foreach ($response as $item) {
            array_push($transformed, [
                'name' => $item['name'],
                'number_of_stops' => self::calculateNumberOfStops($item['consumables'], $item['MGLT'], $distanceToTravel)
            ]);
        }

        return $transformed;
    }

    /**
     * @return float|string
     */
    private static function calculateNumberOfStops(string $consumables, string $mglt, string $distanceToTravel)
    {
        if ($consumables === 'unknown' || $mglt === 'unknown') {
            return '--';
        }

        $tripDuration = Carbon::parse($consumables, 'UTC')->diffInHours() * $mglt;

        $numberOfStops = round($distanceToTravel / $tripDuration, 1);

        return (int) $numberOfStops;
    }
}
