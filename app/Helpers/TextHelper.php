<?php

namespace App\Helpers;

use App\Models\Admin\SmsTemplate;

class TextHelper
{
    public static function replace($text, array $replacements)
    {

        foreach ($replacements as $key => $value) {
            $text = str_replace('{' . $key . '}', $value, $text);
        }

        return $text;
    }

    public static function get_text(string $key): string
    {
        return SmsTemplate::where('key', $key)
            ->where('is_active', 1)
            ->value('content') ?? '';
    }
}
