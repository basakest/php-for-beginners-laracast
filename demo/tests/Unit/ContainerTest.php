<?php

use Core\Container;

test('can get item from container', function () {
    $container = new Container;
    $key = 'foo';
    $container->bind($key, fn() => 'bar');
    $result = $container->resolve($key);
    expect($result)->toEqual('bar');
});
