<?php

namespace App\DataGenerators;

use App\Providers\IntegerProviderInterface;

class IntegerGenerator implements IntegerProviderInterface
{
    private $min;
    private $max;

    private $amount;

    private $i = -1;

    private $current;

    public function __construct(int $min, int $max, int $amount)
    {
        $this->min = $min;
        $this->max = $max;
        $this->amount = $amount;
        $this->getNext();
    }

    public function getNext(): ?int {
        if ($this->hasNext()) {
            $this->i++;
            $this->current = mt_rand($this->min, $this->max);
        } else {
            $this->current = null;
        }
        return $this->current;
    }

    public function getCurrent(): ?int {
        return $this->current;
    }

    public function getIndex(): int {
        return $this->i;
    }

    public function hasNext(): bool
    {
        return ($this->i < $this->amount);
    }
}
