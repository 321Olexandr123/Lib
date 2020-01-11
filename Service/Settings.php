<?php


namespace ExchangeBundle\Service;


class Settings
{
    private static function array_keys_exists(array $keys, array $arr)
    {
        return array_diff_key(array_flip($keys), $arr);
    }

    /**
     * @param array $required
     * @param array $arr
     * @throws \Exception
     */
    public static function validate(array $required, array $arr)
    {
        if (!empty(self::array_keys_exists($required, $arr))) {
            throw new \Exception("Not found " . array_key_first(array_flip(self::array_keys_exists($required, $arr))));
        }
    }
}