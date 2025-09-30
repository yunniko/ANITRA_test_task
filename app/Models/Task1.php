<?php

namespace App\Models;

use App\DataGenerators\IntegerGenerator;
use App\DataProcessors\DuplicateFinder;
use Illuminate\Support\Facades\Cache;

class Task1
{
    private static $cacheKey = "task1_cache";

    public static function getData(): \Ds\Map {
        if (!Cache::has(self::$cacheKey)) {
            $dataProvider = (new IntegerGenerator(1000000, 9999999, 1000000));
            $duplicateFinder = new DuplicateFinder();
            $result = $duplicateFinder->processData($dataProvider);
            Cache::forever(self::$cacheKey, $result);
        } else {
            $result = Cache::get(self::$cacheKey);
        }
        return $result;
    }

    public static function regenerate() {
        Cache::forget(self::$cacheKey);
    }
}
