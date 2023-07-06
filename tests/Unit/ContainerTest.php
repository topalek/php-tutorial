<?php

use Core\Container;

test('it can resolve', function () {
    $container = new Container();
    $container->bind('foo', fn() => 'bar');
    $result = $container->resolve('foo');
    expect($result)->toEqual('bar');
});

test('it can resolve', function () {
    $container = new Container();
    $container->bind('foo', fn() => 'bar');
    $result = $container->resolve('foo');
    expect($result)->toEqual('bar');
});
