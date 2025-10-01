<?php

namespace App\Models;

use App\API\ApiInterface;
use App\API\SwTypes;

class Task2
{
    protected $api;

    public function __construct(ApiInterface $api)
    {
        $this->api = $api;
    }

    public function getStarshipsByPilotPlanet($planetName) {
        $data = $this->api->search(SwTypes::Planets, $planetName);
        $planets = $data->json('results', []);
        $starships = [];
        foreach ($planets as $planet) {
            $residentLinks = $planet['residents'] ?? [];
            foreach ($residentLinks as $resident) {
                $residentData = $this->api->get($resident);
                $residentStarshipsData = $residentData->json('starships', []);
                foreach ($residentStarshipsData ?? [] as $starship) {
                    $starship = $this->api->get($starship)->json();
                    if (!empty($starship)) {
                        $starships[$starship['url']] = $starship;
                    }
                }
            }
        }
        return array_values($starships);
    }
}
