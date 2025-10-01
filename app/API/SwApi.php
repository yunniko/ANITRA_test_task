<?php

namespace App\API;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
class SwApi implements ApiInterface
{

    public const BASE_URL = "http://swapi.dev/api/";

    public function get($route): Response{
        return Http::get($route);
    }
    private function getRoute(SwTypes $route): string {
        $method = null;
        switch ($route) {
            case SwTypes::People:
                $method ='people';
                break;
            case SwTypes::Starships:
                $method = 'starships';
                break;
            case SwTypes::Planets:
                $method = 'planets';
                break;
        }
        return self::BASE_URL . $method;
    }

    public function search(SwTypes $type, $query): Response {
        $route = $this->getRoute($type) . "?search=" . htmlentities($query);
        return $this->get($route);
    }

    public function getById(SwTypes $type, $id): Response {
        $route = $this->getRoute($type) . "/" . htmlentities($id);
        return $this->get($route);
    }

    public function getAll(SwTypes $type): Response {
        $route = $this->getRoute($type);
        return $this->get($route);
    }
}
