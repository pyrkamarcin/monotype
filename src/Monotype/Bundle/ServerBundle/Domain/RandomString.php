<?php

namespace Monotype\Bundle\ServerBundle\Domain;

/**
 * Class RandomString
 * @package Monotype\Bundle\ServerBundle\Domain
 */
class RandomString
{
    /**
     * @param int $length
     * @return string
     */
    public static function generate(int $length = 10)
    {
        $characters = '0123456789abcdef';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}
