<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class MathExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('round', function ($v) {
                return round($v);
            }),
        ];
    }

    public function getFilters(): array
    {
        return [
            new TwigFilter('increment', function ($v) {
                return ++$v;
            }),
        ];
    }
}
