<?php

namespace Modules\Blueprint\Helpers;

class DifTestScale
{
    private static float $skillScale = 0.75;
    private static float $attrScale = 0.65;

    public static function tMod(int $level):float{
        return ($level/5)**static::$skillScale;
    }

    public static function attrMod(int $attribute):float
    {
        $ratio = $attribute/10;
        return (2 * ($ratio**static::$attrScale) - $ratio);
    }

    public static function difficult(int $attribute, int $skill):float
    {
        return 100 * static::attrMod($attribute) * static::tMod($skill);
    }

    public static function difficultForHumans(int $attribute, int $skill):string
    {
        return number_format(static::difficult($attribute, $skill), 2, ',', '.');
    }
}
