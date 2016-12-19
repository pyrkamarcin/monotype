<?php

namespace Monotype\Server\Handler;

class StringOperators
{

    public static function getFileName(string $line)
    {
        return self::leftReplace('_', '.', str_replace('%_N_', '', $line));
    }

    public static function leftReplace($search, $replace, $subject)
    {
        $pos = strrpos($subject, $search);

        if ($pos !== false) {
            $subject = substr_replace($subject, $replace, $pos, strlen($search));
        }

        return $subject;
    }

    public static function getTwoFirstLines(string $message)
    {
        $array = explode("\n", $message);
        if (count($array) >= 2) {
            return [0 => $array[0], 1 => $array[1]];
        } else {
            return false;
        }
    }

    public static function getPath(string $line)
    {
        return str_replace('_', '.', str_replace(['_N_', ';$PATH='], '', $line));
    }
}
