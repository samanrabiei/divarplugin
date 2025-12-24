<?php

namespace App\Helpers;

use App\Models\Admin\SmsTemplate;

class TextHelper
{
    public static function replace($key_content, array $replacements)
    {
        $text = self::get($key_content);

        foreach ($replacements as $key => $value) {
            $text = str_replace('{' . $key . '}', $value, $text);
        }

        return $text;
    }

    public static function get(string $key): string
    {
        return SmsTemplate::where('key', $key)
            ->where('is_active', 1)
            ->value('content') ?? '';
    }
}
