<?php

namespace Core\Middleware;

use Exception;

class Middleware
{
    const MAP = [
        'auth'  => Auth::class,
        'guest' => Guest::class,
    ];

    /**
     * @throws Exception
     */
    public function resolve(string $key): void
    {
        if (!$key) {
            return;
        }
        if (array_key_exists($key, self::MAP)) {
            // dd((new (self::MAP[$key])));
            (new (self::MAP[$key]))->handle();
        } else {
            throw new Exception("No matching middleware found for 'key' $key.");
        }
    }
}