<?php

namespace App\Helpers;

class TextHelper
{
    public static function replace($text, array $replacements)
    {
        foreach ($replacements as $key => $value) {
            $text = str_replace('{' . $key . '}', $value, $text);
        }

        return $text;
    }
}
