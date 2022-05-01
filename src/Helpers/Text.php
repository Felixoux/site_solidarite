<?php

namespace App\Helpers;

class Text
{

    public static function exerpt(string $content, int $limit = 60)
    {
        if (mb_strlen($content) <= $limit) {
            return $content;
        }
        $lastSpace = strpos($content, ' ', $limit);
        return substr($content, 0, $lastSpace) . '...';
    }

    public static function strong(int $position = 3, string $string): string
    {
        if (strlen($string) < 50) {
            return $string;
        }
        $string = e($string);
        $strArray = explode(' ', $string);
        $word = $strArray[$position - 1];
        $replace = '<strong>' . $word . '</strong>';
        $sentence = str_replace($word, $replace, $string);
        return $sentence;
    }

    public static function parseDown(string $content): string
    {
        $parseDown = new \Parsedown();
        $parseDown->setSafeMode(true);
        return $parseDown->text($content);
    }


}