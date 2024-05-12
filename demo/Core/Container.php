<?php

namespace Core;

use mysql_xdevapi\Exception;

class Container
{
    public array $instances = [];

    public function bind($key, $resolver): void
    {
        $this->instances[$key] = $resolver;
    }

    public function resolve($key)
    {
        if (!array_key_exists($key, $this->instances)) {
            throw new Exception("can't find key: $key in container");
        }
        return call_user_func($this->instances[$key]);
    }
}
