<?php

namespace App\API;

use Illuminate\Http\Client\Response;

interface ApiInterface
{
    public function get($route): Response;
    public function search(SwTypes $type, $search): Response;
    public function getById(SwTypes $type, $id): Response;
}
