<?php

namespace App\DataProcessors;

use App\Providers\IntegerProviderInterface;
use Barryvdh\Debugbar\Facades\Debugbar;
use Ds\Map;
use Ds\Set;

class DuplicateFinder
{
    public function processData(IntegerProviderInterface $dataProvider): Map{
        $result = new Map();
        $temporarySet= new Set();
        $temporarySet->add($dataProvider->getCurrent());
        while ($dataProvider->hasNext()) {
            $n = $dataProvider->getNext();
            if ($temporarySet->contains($n)) {
                $val = $result->get($n, 1);
                $result->put($n, $val + 1);
            }
            else $temporarySet->add($n);
        }
        $result->ksort();
        return $result;
    }
}
