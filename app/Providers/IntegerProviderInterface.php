<?php

namespace App\Providers;

interface IntegerProviderInterface
{
    public function getNext(): ?int;

    public function getCurrent(): ?int;

    public function getIndex(): int;

    public function hasNext(): bool;
}
